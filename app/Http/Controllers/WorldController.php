<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailPriceIncreaseToSubscribers;
use App\Mail\NotifyUserPriceIncreaseMail;
use App\Models\Like;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\User as Influencer;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maestroerror\HeicToJpg;
use Redirect;
use Session;
use Stripe\Price;
use Stripe\Product as StripeProduct;
use Stripe\Stripe;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class WorldController extends Controller
{
    /**
     * Show the world page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function world()
{
    // dd('asd');
    // dd(Auth::check());
    //   if (Auth::check() && Auth::user()->role === 'business') {
    //             return abort(403, 'Access denied');
    //             // or redirect('/somewhere')
    //   }
    $cutoffDateRecent = Carbon::now()->subDays(290);
    $cutoffDateOldest = Carbon::now()->subDays(38);

    $recentPosts = Post::select('posts.id', 'posts.influencer_id', 'posts.no_of_likes', 'posts.tagged_profile_pictures', 'posts.image_video', 'posts.created_at', 'posts.visible', 'posts.tags', 'posts.thumbnail')
    ->join('users', 'posts.influencer_id', '=', 'users.id')
    ->where('users.status', 'active')
    ->where('posts.created_at', '>=', $cutoffDateRecent)
    ->orderByDesc('posts.no_of_likes')
    ->orderByDesc('posts.created_at')
    ->get();


    $users = User::select('id', 'role', 'no_of_followers', 'vip')
    ->where('status', 'active')
    ->get()
    ->keyBy('id');


    $groupedRecent = $recentPosts->groupBy('influencer_id');

    $finalPosts = collect();
    $userPostCount = [];

    $addPostIfAllowed = function ($post) use (&$finalPosts, &$userPostCount) {
        $uid = $post->influencer_id;
        if (!isset($userPostCount[$uid])) {
            $userPostCount[$uid] = 0;
        }
        if ($userPostCount[$uid] < 3) {
            $finalPosts->push($post);
            $userPostCount[$uid]++;
        }
    };

    $randomHighLikesPosts = Post::select('posts.*')
    ->join('users', 'posts.influencer_id', '=', 'users.id')
    ->where('users.status', 'active')
    ->where('posts.no_of_likes', '>', 500)
    ->inRandomOrder()
    ->get();


    $seenUsers = [];
    $seenPosts = [];
    $topPostsWith10K = collect();

    foreach ($randomHighLikesPosts as $post) {
        if (!isset($users[$post->influencer_id])) continue;
        if (in_array($post->id, $seenPosts)) continue;

        if ($post->no_of_likes > 7000) {
            if (!isset($seenUsers[$post->influencer_id])) {
                $seenUsers[$post->influencer_id] = 0;
            }

            if ($seenUsers[$post->influencer_id] < 3) {
                $topPostsWith10K->push($post);
                $seenPosts[] = $post->id;
                $seenUsers[$post->influencer_id]++;
            }

            if ($topPostsWith10K->count() >= 5) break;
        }
    }

    foreach ($topPostsWith10K as $post) {
        $addPostIfAllowed($post);
    }

    $remainingRandomPosts = $randomHighLikesPosts->diff($topPostsWith10K);

    foreach ($remainingRandomPosts as $post) {
        if ($finalPosts->count() >= 15) break;
        $addPostIfAllowed($post);
    }

    $addedPostIds = [];

    foreach ($groupedRecent as $userId => $group) {
        $user = $users->get($userId);
        if (!$user) continue;

        $group = $group->sortByDesc('no_of_likes');

        $safeAdd = function ($post) use (&$addedPostIds, $addPostIfAllowed) {
            if (!in_array($post->id, $addedPostIds)) {
                $addPostIfAllowed($post);
                $addedPostIds[] = $post->id;
            }
        };

        if ($user->role === 'influencer') {
            foreach ($group->take(2) as $post) {
                $safeAdd($post);
            }
        } else {
            $topPosts = $group->values();
            if ($topPosts->isNotEmpty()) {
                $top1 = $topPosts->first();
                $likes = $top1->no_of_likes;
                $followers = max($user->no_of_followers, 1);

                if ($topPosts->count() > 1 && $likes > $followers * 1.38) {
                    foreach ($topPosts->take(2) as $post) {
                        $safeAdd($post);
                    }
                } else {
                    $safeAdd($top1);
                }
            }
        }
    }

    if (rand(1, 100) <= 30) {
        $olderPosts = Post::select('id', 'influencer_id', 'no_of_likes', 'tagged_profile_pictures', 'image_video', 'created_at', 'visible', 'tags')
            ->whereBetween('created_at', [$cutoffDateOldest, $cutoffDateRecent])
            ->orderByDesc('no_of_likes')
            ->orderByDesc('created_at')
            ->get();

        $groupedOlder = $olderPosts->groupBy('influencer_id');

        foreach ($groupedOlder as $group) {
            $lastPost = $group->last();
            if ($lastPost) {
                $addPostIfAllowed($lastPost);
            }
        }
    }

    // Final deduplication and sorting
    $finalPosts = $finalPosts->unique('id')->values();

    $finalPosts = $finalPosts->sortByDesc(function ($post) {
        return $post->no_of_likes * 1000000 + $post->created_at->timestamp;
    })->values();

    // ==== VIP Logic Starts Here ====
    $vipUsers = $users->filter(function ($user) {
        return $user->vip == 1;
    });

    $vipPosts = collect();
    foreach ($vipUsers as $vipUser) {
        $userPosts = $finalPosts->filter(function ($post) use ($vipUser) {
            return $post->influencer_id == $vipUser->id;
        });

        if ($userPosts->isNotEmpty()) {
            $vipPosts->push($userPosts->random());
        }
    }

    $nonVipPosts = $finalPosts->reject(function ($post) use ($vipPosts) {
        return $vipPosts->pluck('id')->contains($post->id);
    })->values();

    $injected = $nonVipPosts->slice(0, 15)->values();

    foreach ($vipPosts as $vipPost) {
        $position = rand(0, $injected->count());
        $injected->splice($position, 0, [$vipPost]);
        $injected = $injected->slice(0, 15);
    }

    $remainingPosts = $nonVipPosts->slice(15)->values();
    $finalPosts = $injected->concat($remainingPosts)->unique('id')->values();
    // ==== VIP Logic Ends ====

    // === Inject Ads After Every 12 Posts ===
    $ads = DB::table('ads')
        ->where('status', 1)
        ->inRandomOrder()
        ->take(5)
        ->get();

    $adsIndex = 0;
    $withAds = collect();

    foreach ($finalPosts as $index => $post) {
        $withAds->push($post);

        if (($index + 1) % 12 === 0 && isset($ads[$adsIndex])) {
            $ad = (object)[
                'id' => 'ad_' . $ads[$adsIndex]->id,
                'is_ad' => true,
                'content' => $ads[$adsIndex],
            ];
            $withAds->push($ad);
            $adsIndex++;
        }
    }

    // === Paginate ===
    $perPage = 15;
    $currentPage = LengthAwarePaginator::resolveCurrentPage('page');
    $currentItems = $withAds->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $postsPaginated = new LengthAwarePaginator(
        $currentItems,
        $withAds->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query() + ['page' => $currentPage]]
    );

    $influencers = User::where('role', 'influencer')->get();

    return view('world', [
        'posts' => $postsPaginated,
        'postz' => $postsPaginated,
        'influencers' => $influencers
    ]);
}


}
