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


class InfluencerController extends Controller
{
    function index()
    {

        $last_three_posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(2)->get();
        $influencers = User::query()->where('role', '=', 'influencer')->get();
        $users = User::query()->where('role', '=', 'user')->get();

        // Subscription deletion logic

        // $Subscriptions = Subscription::where('user_id',Auth::user()->id)->get();
        // foreach($Subscriptions as $Subscription) {
        //     $created_at = $Subscription->created_at;

        //     $time = strtotime($created_at);
        //     $Subscription_limit = date("Y-m-d", strtotime("+1 month", $time));
        //     $Subscription_limit = strtotime($Subscription_limit);

        //     $current_date = date("Y-m-d");
        //     $current_date = strtotime($current_date);


        //     if($current_date > $Subscription_limit) {
        //         $Subscription->delete();
        //     }


        // }


        return view('influencer.activity', ['last_three_posts' => $last_three_posts, 'influencers' => $influencers, 'Users' => $users]);


    }
    
    

public function updateChatToggle(Request $request)
{
    try {
        $user = auth()->user();
        $user->chat_toggle = $request->chat_toggle;
        $user->save();
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}




    function posts()
    {


        $posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $influencers = User::where('role', 'influencer')->get();

        return view('influencer.posts', ['posts' => $posts, 'influencers' => $influencers]);


    }

    function feed()
    {


        $posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $influencers = User::where('role', 'influencer')->get();

        return view('influencer.feed', ['posts' => $posts, 'influencers' => $influencers]);


    }
    
    
public function world()
{
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

    return view('influencer.world', [
        'posts' => $postsPaginated,
        'postz' => $postsPaginated,
        'influencers' => $influencers
    ]);
}





public function add_post(Request $request)
{
    $Post = new Post();
    $Post->influencer_id = Auth::user()->id;

    $file = $request->post_image_video;
    $originalName = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $mimeType = $file->getMimeType();

    $imageName = rand(1, 10) . $originalName;
    $imagePath = $file->move('assets/images', $imageName);

    if ($extension === 'heic') {
        $convertedPath = $this->convertHeicToJpg($imagePath);
        $Post->image_video = $convertedPath;
    }
    // elseif ($extension === 'mov') {
    //     $convertedPath = $this->convertMovToMp4($imagePath);
    //     $Post->image_video = $convertedPath;
    // } 
    else {
        $Post->image_video = $imageName;
    }

    if ($request->filled('tags')) {
        $Post->tags = $request->input('tags');
    }

    if ($request->filled('tagged_user_profiles')) {
        $taggedProfiles = json_decode($request->input('tagged_user_profiles'), true);

        $profilePictures = array_map(function ($user) {
            return $user['profile_picture'] ?? null;
        }, $taggedProfiles);

        $Post->tagged_profile_pictures = implode(',', array_filter($profilePictures));
    }

    if (str_starts_with($mimeType, 'video/')) {
     $thumbnailName = pathinfo($imageName, PATHINFO_FILENAME) . '.jpg';
     $thumbnailFolder = "/home/ednqswmq/live.superfanss.app/assets/images/thumbnails";
     $thumbnailPath = "$thumbnailFolder/$thumbnailName";


        if (!file_exists($thumbnailFolder)) {
            mkdir($thumbnailFolder, 0755, true);
        }

         // Generate thumbnail using FFmpeg
     $ffmpegCommand = "ffmpeg -i " . escapeshellarg($imagePath) . " -ss 00:00:01.000 -vframes 1 " . escapeshellarg($thumbnailPath);
    exec($ffmpegCommand);
    $Post->thumbnail = $thumbnailName;
    }

    $Post->visible = 1;
    $Post->save();

    return Redirect::back()->with('post_added', 'Post Added');
}



    function delete_post($id)
    {
        $Post = Post::find($id);
        if ($Post != null) {
            $Post->delete();
        }


        return Redirect::back()->with('post_added', 'Post Deleted');
    }

    function delete_all_post($id)
    {
        $Post = Post::find($id);
        if ($Post != null) {
            $Post->delete();
        }


        return Redirect::back()->with('all_post', 'Post Deleted');
    }

    function update_username_url(Request $request)
    {
        $User = User::find($request->influencer_id);

        $username_url_check = User::where('username_URL', $request->username_url)->count();

        if ($username_url_check == 0) {
            $User->username_URL = $request->username_url;
            $User->save();
            return Redirect::back()->with('message', 'Username/url editted successfully');
        } else {
            return Redirect::back()->with('duplicate_error', 'The username is already associated with an account');
        }


        //  return Redirect::back()->with('message', 'Username/url editted successfully');
    }

    function add_network(Request $request)
    {
        $User = User::find($request->user_id);
        $Influencer_networks = $User->Influencer_networks;
        $Influencer_networks_profile_links = $User->Influencer_networks_profile_links;


        if ($Influencer_networks != null) {
            $Influencer_networks = $Influencer_networks . "," . $request->network_id;
            $Influencer_networks_profile_links = $Influencer_networks_profile_links . "," . $request->network_url;
        } else {
            $Influencer_networks = $request->network_id;
            $Influencer_networks_profile_links = $request->network_url;
        }


        $User->Influencer_networks = $Influencer_networks;
        $User->Influencer_networks_profile_links = $Influencer_networks_profile_links;
        $User->save();

        return Redirect::back()->with('message', 'Network added successfully');
    }

function update_price_of_subscription(Request $request)
{
    $User = User::find($request->influencer_id);
    $price_of_subscription = round($request->price_of_subscription, 2);
    $price_of_subscription = $price_of_subscription + 0;

    if (str_contains($request->price_of_subscription, ".")) {
        if (substr($request->price_of_subscription, -1) == 0) {
            if (strlen(substr(strrchr($request->price_of_subscription, "."), 1)) <= 2 || substr($request->price_of_subscription, -2) == 0) {
                $price_of_subscription = $price_of_subscription . "0";
            }
        }
    }
    $User->price_of_subscription = $price_of_subscription;
    $User->save();

    $product = Product::where('influencer_id', $User->id)->first();
Stripe::setApiKey(env('STRIPE_SECRET'));
    if (!$product && $User->role === 'influencer') {
    

    // Create Stripe Product
    $stripeProduct = StripeProduct::create([
        'name' => $User->name . ' Subscription',
        'description' => 'Subscription for ' . $User->name,
    ]);

    // Create Stripe Price
    $stripePrice = Price::create([
        'unit_amount' => round($User->price_of_subscription * 100),
        'currency' => 'usd',
        'recurring' => ['interval' => 'month'],
        'product' => $stripeProduct->id,
    ]);

    // Save to local DB
    $product = Product::create([
        'influencer_id' => $User->id,
        'external_product_id' => $stripeProduct->id,
        'external_price_id' => $stripePrice->id,
    ]);
}


    // retrieve stripe product
    $stripeProduct = StripeProduct::retrieve($product->external_product_id);

    // Ensure default price is a string ID, not object
    $currentDefaultPrice = null;
    if (is_string($stripeProduct->default_price)) {
        $currentDefaultPrice = $stripeProduct->default_price;
    } elseif (is_object($stripeProduct->default_price) && isset($stripeProduct->default_price->id)) {
        $currentDefaultPrice = $stripeProduct->default_price->id;
    }

    // Create a new Price with the updated amount
    $newPrice = Price::create([
        'unit_amount' => $request->amount * 100, // amount in cents
        'currency' => 'usd', // replace with your currency
        'product' => $stripeProduct->id,
        'recurring' => ['interval' => 'month'],
    ]);

    // Update product's default price
    StripeProduct::update($product->external_product_id, [
        'default_price' => $newPrice->id,
    ]);

    // Archive old price if different
    if ($currentDefaultPrice && $currentDefaultPrice !== $newPrice->id) {
        Price::update($currentDefaultPrice, [
            'active' => false,
        ]);
    }

    // Notify subscribers about price increase
    $influencer = Influencer::find($User->id);
    $followerships = DB::table('followerships')->where('follower_user_id', $User->id)->get();

    $emailsSend = 0;
    foreach ($followerships as $subscriber) {
        $follower = \App\Models\User::find($subscriber->followed_user_id);
        if ($emailsSend === 10) {
            sleep(5);
            $emailsSend = 0;
        }

        // Send notification email
        \Mail::to($follower->email)->send(new NotifyUserPriceIncreaseMail($follower, $influencer->price_of_subscription));
        $emailsSend++;
    }

       return Redirect::back()->with('message', 'Price of subscription editted successfully')->with('message_price_of_fee', 'Los antiguos fans van a permanecer con la misma tarifa con la que se suscribieron');
}


    function networks_url(Request $request)
    {
        $User = User::find($request->user_id);


        $all_network_urls = implode(",", $request->network_urls);
        $User->Influencer_networks_profile_links = $all_network_urls;
        $User->save();

        // return Redirect::back()->with('message', 'Price of subscription editted successfully');
        return Redirect::back()->with('message', 'Networks updated successfully');
    }
    
    public function toggle_all_visibility()
{

    $posts = DB::table('posts')->where('influencer_id', Auth::user()->id)->get();

    if ($posts->isEmpty()) {
        return redirect()->back()->with('error', 'No posts found for this influencer.');
    }


    $allVisible = $posts->every(function ($post) {
        return $post->visible == 1;
    });

    $newVisibility = $allVisible ? 0 : 1;

    DB::table('posts')
        ->where('influencer_id', Auth::user()->id)
        ->update(['visible' => $newVisibility]);

    // Success message
    $status = $newVisibility ? 'visible' : 'invisible';

    return redirect()->back()->with('post_added', true)
                              ->with('success', "All posts are now set to {$status}.")
                             ->with('posts', $posts)
                             ->with('visibility_status', $newVisibility);
}


    public function visible_post($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        $newVisibility = $post->visible == 1 ? 0 : 1;

        DB::table('posts')->where('id', $id)->update(['visible' => $newVisibility]);

        return redirect()->back()->with('post_added', true)->with('success', 'Post visibility updated.');
    }
    
    function delete_network($id)
    {
        $User = User::find(Auth::user()->id);

        $Influencer_networks_profile_links = $User->Influencer_networks_profile_links;
        $Influencer_networks = $User->Influencer_networks;

        $Influencer_networks = explode(',', $Influencer_networks);
        $Influencer_networks_profile_links = explode(',', $Influencer_networks_profile_links);


        $Influencer_networks_new = [];
        $Influencer_networks_profile_links_new = [];

        $index = 0;
        foreach ($Influencer_networks as $Influencer_network) {

            if ($Influencer_network != $id) {
                $Influencer_networks_new[$index] = $Influencer_networks[$index];
                $Influencer_networks_profile_links_new[$index] = $Influencer_networks_profile_links[$index];
            }

            $index = $index + 1;

        }


        $Influencer_networks_new = implode(',', $Influencer_networks_new);
        $Influencer_networks_profile_links_new = implode(',', $Influencer_networks_profile_links_new);


        $User->Influencer_networks = $Influencer_networks_new;
        $User->Influencer_networks_profile_links = $Influencer_networks_profile_links_new;
        $User->save();

        return Redirect::back()->with('message', 'Network deleted successfully');;
    }

    function update_earnings(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->earnings = $request->earnings;
        $User->save();

        return Redirect::back()->with('message', 'Earnings editted successfully');
    }


    function check_duplicate_email_username(Request $request)
    {

        $User_count = User::where('email', $request->email)->count();

        $username_URL = User::where('username_URL', $request->Choose_username_or_URL)->count();


        if ($User_count > 0) {
            return response("email exists");
        } else if ($username_URL > 0) {
            return response("username exists");
        } else {
            return response("unique email and username");
        }

    }


    function post_detail($id)
    {
        $current_post = Post::find($id);

        $influencer_id = $current_post->influencer_id;

        $posts = Post::where('influencer_id', $influencer_id)->get(); // posts for showing in feed

        // dd($influencer_id);

        // if($influencer_id == Auth::user()->id) {

        // } else {

        // }

        $Posts = Post::where('influencer_id', $influencer_id)->get();

        $next = 0;
        $prev_post_id = null;
        $next_post_id = null;

        foreach ($Posts as $Post) {

            if ($Post->id < $current_post->id) {
                $prev_post_id = $Post->id;
            }


            if ($Post->id > $current_post->id) {
                if ($next == 0) {
                    $next_post_id = $Post->id;
                    $next = 1;
                }

            }


        }

        if (!isset($prev_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->get()->last();
            $prev_post_id = $Post->id;
        }

        if (!isset($next_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->first();
            $next_post_id = $Post->id;
        }

        $influencers = User::where('role', 'influencer')->get();

        // $posts = Post::where('influencer_id',Auth::user()->id)->orderBy('id', 'DESC')->get();

        return view('influencer.post_detail', ['current_post' => $current_post, 'prev_post_id' => $prev_post_id, 'next_post_id' => $next_post_id, 'influencers' => $influencers, 'posts' => $posts]);
    }

 public function autocompleteInfluencerSearch(Request $request)
{
    $query = $request->get('query');

    $filterResult = User::select('username_URL as name', 'verified')
        ->where('username_URL', 'LIKE', '%' . $query . '%')
        ->where(function ($q) {
            $q->where('role', 'influencer')->orWhere('role', 'user');
        })
        ->get()
        ->map(function ($user) {
            return [
                'name' => $user->name,
                'verified' => $user->verified
            ];
        });

    return response()->json($filterResult);
}


    public function autocompleteUserSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = User::select('username_URL as name')->where('username_URL', 'LIKE', '%' . $query . '%')->where('role', 'user')->get();
        return response()->json($filterResult);
    }


    function update_profile_image(Request $request)
    {


        $User = User::find($request->influencer_id);

        // $imageName = rand(1,10).$request->profile_image->getClientOriginalName();
        //  $imagePath = $request->profile_image->move(public_path('assets/images'), $imageName);
        //$imagePath = $request->profile_image->move('assets/images', $imageName);

        $imageName = Session::get('image_name');
        $User->profile_picture = $imageName;

        $User->save();

        return Redirect::back()->with('message', 'Profile picture updated');


    }


    function update_cover_image(Request $request)
    {


        $User = User::find($request->influencer_id);

        // $imageName = rand(1,10).$request->cover_image->getClientOriginalName();
        // $imagePath = $request->cover_image->move(public_path('assets/images'), $imageName);
        // $imagePath = $request->cover_image->move('assets/images', $imageName);
        $imageName = Session::get('image_name');
        $User->cover_picture = $imageName;

        $User->save();

        return Redirect::back()->with('message', 'Cover picture updated');


    }
    
    public function updateCoverColor(Request $request)
{
    $User = User::find($request->influencer_id);
    $User->cover_color = $request->cover_color;

    if (!empty($User->cover_picture)) {
        $User->cover_picture = null;
    }

    $User->save();

    return Redirect::back()->with('message', 'Cover color updated');
}



    function update_bank_account(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->bank_account = $request->bank_account;
        $User->save();

        return Redirect::back()->with('message', 'Bank account editted successfully');
    }

    function update_paypal_account(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->paypal_account = $request->paypal_account;
        $User->save();

        return Redirect::back()->with('message', 'Paypal account editted successfully');
    }


    function update_name(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->name = $request->name;
        $User->save();

        return Redirect::back()->with('message', 'Name editted successfully');
    }
    
    public function update_birth(Request $request)
{
    $User = User::find($request->influencer_id);
    $User->birth = $request->birth;
    $User->save();

    return Redirect::back()->with('message', 'Birthdate updated successfully');
}

public function update_country(Request $request)
{
    $User = User::find($request->influencer_id);
    $User->country = $request->country;
    $User->save();

    return Redirect::back()->with('message', 'Country updated successfully');
}

public function update_gender(Request $request)
{
    $User = User::find($request->influencer_id);
    $User->gender = $request->gender;
    $User->save();

    return Redirect::back()->with('message', 'Gender updated successfully');
}


    function update_surname(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->surname = $request->surname;
        $User->save();

        return Redirect::back()->with('message', 'Surname editted successfully');
    }

    function update_email(Request $request)
    {
        $User = User::find($request->influencer_id);


        $email_check = User::where('email', $request->email)->count();

        if ($email_check == 0) {
            $User->email = $request->email;
            $User->save();
            return Redirect::back()->with('message', 'Email editted successfully');
        } else {
            return Redirect::back()->with('duplicate_error', 'The email is already associated with an account');
        }


    }


    function update_password(Request $request)
    {
        $User = User::find($request->influencer_id);
        $password = Hash::make($request->password);
        $User->password = $password;
        $User->save();

        return Redirect::back()->with('message', 'Password editted successfully');
    }


    function update_first_network(Request $request)
    {
        // $User = User::find($request->influencer_id);
        // $first_network = $request->first_network;

        // $Influencer_networks = $User->Influencer_networks;
        // $Influencer_networks = explode(",", $Influencer_networks);

        // $Influencer_networks_profile_links = $User->Influencer_networks_profile_links;
        // $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);

        // $new_arrangement_influencer_networks = "";
        // $new_arrangement_influencer_networks = $first_network.",";

        // $new_arrangement_profile_links = "";

        // $index = 0;
        // foreach($Influencer_networks as $Influencer_network) {
        //     if($Influencer_network != $first_network) {
        //         $new_arrangement_influencer_networks .= $Influencer_network.",";
        //         $new_arrangement_profile_links .= $Influencer_networks_profile_links[$index].",";
        //     } else {
        //         $temp = $new_arrangement_profile_links;

        //         $new_arrangement_profile_links = "";
        //         $new_arrangement_profile_links .= $Influencer_networks_profile_links[$index].",";

        //         $new_arrangement_profile_links .= $temp;


        //     }


        //     $index = $index + 1;
        // }


        // $last_charachter = substr($new_arrangement_influencer_networks, -1);

        // if($last_charachter == ",") {
        //     $new_arrangement_influencer_networks = substr($new_arrangement_influencer_networks, 0, -1);
        // }

        // // $first_charachter = substr($new_arrangement_influencer_networks, 0, 1);

        // // if($first_charachter == ",") {
        // //     $new_arrangement_influencer_networks = substr($new_arrangement_influencer_networks, 1);
        // // }


        // $User->Influencer_networks = $new_arrangement_influencer_networks;
        // $User->Influencer_networks_profile_links = $new_arrangement_profile_links;

        // $User->save();


        // return Redirect::back()->with('message', 'Network successfully');

        $User = User::find($request->influencer_id);
        $first_network = $request->first_network;

        $Influencer_networks = $User->Influencer_networks;
        $Influencer_networks = explode(",", $Influencer_networks);

        $Influencer_networks_profile_links = $User->Influencer_networks_profile_links;
        $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);

        $new_arrangement_influencer_networks = "";
        $new_arrangement_influencer_networks = $first_network . ",";

        $new_arrangement_profile_links = "";

        $index = 0;
        foreach ($Influencer_networks as $Influencer_network) {
            if ($Influencer_network != $first_network) {
                $new_arrangement_influencer_networks .= $Influencer_network . ",";
                $new_arrangement_profile_links .= $Influencer_networks_profile_links[$index] . ",";
            } else {
                $temp = $new_arrangement_profile_links;

                $new_arrangement_profile_links = "";
                $new_arrangement_profile_links .= $Influencer_networks_profile_links[$index] . ",";

                $new_arrangement_profile_links .= $temp;


            }


            $index = $index + 1;
        }


        $last_charachter = substr($new_arrangement_influencer_networks, -1);

        if ($last_charachter == ",") {
            $new_arrangement_influencer_networks = substr($new_arrangement_influencer_networks, 0, -1);
        }

        $User->Influencer_networks = $new_arrangement_influencer_networks;
        $User->Influencer_networks_profile_links = $new_arrangement_profile_links;

        $User->save();


        return Redirect::back()->with('message', 'Network successfully');
    }


    function influencers()
    {

        $influencers = User::where('role', 'influencer')->get();

        $user = User::find(Auth::user()->id);


        return view('influencer.influencers', ['influencers' => $influencers, 'user' => $user]);

    }


    function influencer_activity($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;

        $influencer_user_id = $User->id;

        $last_three_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->limit(2)->get();

        $influencers = User::where('role', 'influencer')->get();


        Session::put('user_ID', Auth::user()->id);

        Session::put('influencer_ID', $id);

        Session::put('amount', $User->price_of_subscription);


        return view('influencer.influencer_activity', ['last_three_posts' => $last_three_posts, 'id' => $id, 'influencers' => $influencers, 'influencer_user_id' => $influencer_user_id]);

    }


    function influencer_posts($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;

        $all_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('influencer.influencer_posts', ['all_posts' => $all_posts, 'id' => $id, 'influencers' => $influencers]);

    }


    function user_activity($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $user = User::where('username_URL', $username_URL)->first();


        $id = $user->id;

        $influencer_user_id = $user->id;

        $another_user_id = $id;

        $last_three_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->limit(2)->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('influencer.user_activity', ['last_three_posts' => $last_three_posts, 'id' => $id, 'influencers' => $influencers, 'user' => $user, 'another_user_id' => $another_user_id]);

    }

    function user_posts($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;

        $another_user_id = $id;

        $all_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('influencer.user_posts', ['all_posts' => $all_posts, 'id' => $id, 'influencers' => $influencers, 'another_user_id' => $another_user_id]);

    }


    function footer_name_username(Request $request)
    {
        $User = User::find($request->user_id);
        $User->footer_name_username = $request->footer_name_username;
        $User->save();

        return Redirect::back()->with('message', 'Footer content editted successfully');
    }

    function update_instagram_link(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->instagram_link = $request->instagram_link;
        $User->save();

        return Redirect::back()->with('message', 'Instagram link editted successfully');
    }


    function like_dislike_post(Request $request)
    {
        $Like = Like::where("post_id", $request->post_id)->where("user_id", Auth::user()->id)->first();

        if ($Like === null) {

            $Post = Post::find($request->post_id);

            $influencer_id = $Post->influencer_id;

            $Like = new Like();
            $Like->post_id = $request->post_id;
            $Like->user_id = Auth::user()->id;
            $Like->influencer_id = $influencer_id;
            $Like->save();
            return response("post liked");
        } else {
            $Like->delete();
            return response("post disliked");
        }


    }


    function update_profile_picture_border_status(Request $request)
    {
        $user_id = $request->user_id;
        $User = User::find($user_id);
        $User->profile_picture_border_status = $request->profile_picture_border_status;
        $User->save();


        return Redirect::back()->with('message', 'Profile picture border updated successfully');
    }

 function messages()
    {


        $posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $influencers = User::where('role', 'influencer')->get();

        return view('influencer.messages', ['posts' => $posts, 'influencers' => $influencers]);


    }
    function withdraw_earnings(Request $request)
    {
        $influencer_id = $request->influencer_id;
        $User = User::find($influencer_id);
        $earnings = $User->earnings;
        $earnings = $earnings - $request->amount;
        $User->earnings = $earnings;
        $User->save();


        $to = "dmartinherrada@gmail.com";
        $subject = "Payment request of influencer";

        $message = "<p>Hi Admin, <br> This influencer request for payment. <br>
        Influencer:<br>
        Username: " . $request->username . "<br>
        Bank Account: " . $request->bank_account . "<br>
        Paypal Account: " . $request->paypal_account . "<br>
        Amount: " . $request->amount . "<br>
        </p>";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <info@incubadorapluto.com>' . "\r\n";
        $headers .= 'Cc: info@incubadorapluto.com' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent";
        } else {
            echo "Email not sent";
        };

        return back()->with('payment_message', 'Payment withdrawal request sent successfully');

    }


    // Followers Changes

    function all_users()
    {


        $logged = Auth::user()->id;
        if($logged == '100')
        {
      
        $users = User::paginate(700);
        return view('influencer.all_users', compact('users'));

        return view('influencer.all_users', ['users' => $users]);

        }

        else{
            return Redirect::to('/influencer');
        }


    }


    function update_followers(Request $request, $id)
    {

        $log_user = Auth::user();

        $logged_in_user = $log_user->id;

        if ($logged_in_user == 100) {

            if ($request->add_followers) {
                $request->validate([
                    'no_of_followers' => 'required'
                ]);

                $user = User::find($id);

                $old_followers = $user->no_of_followers;

                $new_followers = $old_followers + $request->no_of_followers;

                $user->no_of_followers = $new_followers;

                $user->save();


                return back()->with('follower_message', 'Followers Added Succesfully');

            } else if ($request->remove_followers) {
                $request->validate([
                    'no_of_followers' => 'required'
                ]);

                $user = User::find($id);
                if ($user->no_of_followers < 0) {
                    $user->no_of_followers = 0;
                } else {

                    $old_followers = $user->no_of_followers;
                    if ($old_followers < $request->no_of_followers) {
                        return back()->with('follower_error_message', 'remove followers value must be equal to or less than followers');

                    } else {
                        $new_followers = $old_followers - $request->no_of_followers;
                        $user->no_of_followers = $new_followers;

                        $user->save();
                        return back()->with('follower_message', 'Followers Removed Successfully');
                    }
                }
            }

        } else {
            return Redirect::to('/influencer');
        }

    }


    function all_user_posts($id)
    {

        $users = DB::table('users')
            ->where('id', $id)
            ->get();


        foreach ($users as $user) {
            $uid = $user->id;
        }
        $posts = DB::table('posts')->where('influencer_id', $uid)->get();

        // dd($posts);

        return view('influencer/all_user_posts', ['posts' => $posts]);

    }


public function startAutomaticGrowth(Request $request)
{
    $userId = $request->input('user_id');
    $gear = intval($request->input('gear_level', 1));

    $user = User::findOrFail($userId);

    if ($user->growth_status === 'active') {
        // STOP growth
        $user->growth_status = 'inactive';
        $user->save();

        return back()->with('success', 'Growth stopped.');
    } else {
        
        // START growth
        $user->growth_status = 'active';
        $user->growth_gear_level = $gear;
        $user->growth_start_time = now();
        $user->follower_growth_time = now();
        $user->save();

        return back()->with('success', 'Growth started at Gear ' . $gear);
    }
    
}

public function suspendUser($id)
{
    $user = User::findOrFail($id);
    
    if ($user->status === 'suspended') {
        $user->status = 'active';
        $message = 'User unsuspended successfully.';
    } else {
        $user->status = 'suspended';
        $message = 'User suspended successfully.';
    }

    $user->save();

    return back()->with('follower_message', $message);
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    
    if ($user->status === 'deleted') {
        $user->status = 'active';
        $message = 'User restored successfully.';
    } else {
        $user->status = 'deleted';
        $message = 'User deleted successfully.';
    }

    $user->save();

    return back()->with('follower_message', $message);
}



public function toggleVipStatus(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    $user = \App\Models\User::findOrFail($request->user_id);
    $user->vip = $request->has('vip') ? 1 : 0;
    $user->save();

    return back()->with('success_message', 'VIP status updated.');
}


public function processGrowth()
{
    $users = User::where('growth_status', 'active')->get();

    foreach ($users as $user) {
        $posts = Post::where('influencer_id', $user->id)->latest()->take(10)->get();
        $gear = $user->growth_gear_level;

        foreach ($posts as $post) {
            $growth = rand(1, $gear); // gradual per minute
            $post->no_of_likes += $growth;
            $post->save();
        }


        $user->no_of_followers += rand(1, $gear * 2);
        $user->save();
    }

    return response()->json(['status' => 'Growth processed']);
}

  public function verifyInfluencer(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    $user = \App\Models\User::findOrFail($request->user_id);
    $user->verified = $request->has('verified') ? 1 : 0;
    $user->save();

    return back()->with('success_message', 'Verified status updated.');
}



    function update_likes(Request $request, $id)
    {


        $log_user = Auth::user();

        $logged_in_user = $log_user->id;
        //dd($logged_in_user);
        // if($logged_in_user == 100)
        // {
        $request->validate([
            'no_of_likes' => 'required',
        ]);


        $post = Post::find($id);


        if ($request->add_likes) {
            $old_likes = $post->no_of_likes;
            // dd($old_likes);
            $new_likes = $old_likes + $request->no_of_likes;

            $post->no_of_likes = $new_likes;


            $post->save();


            return Redirect::to('influencer/all_users')->with('likes_added_message', "Likes Added Succesfully");
        } else if ($request->remove_likes) {
            $request->validate([
                'no_of_likes' => 'required',
            ]);

            $post = Post::find($id);

            if ($post->no_of_likes < $request->no_of_likes) {
                return Redirect::to('influencer/all_users')->with('likes_error_message', 'remove likes value must be equal to or less than likes');
            } else {
                $old_likes = $post->no_of_likes;

                $new_likes = $old_likes - $request->no_of_likes;

                $post->no_of_likes = $new_likes;

                $post->save();

                return Redirect::to('influencer/all_users')->with('likes_removed_message', 'likes Removed Successfully');
            }

            return Redirect::to('influencer/all_user_posts');

        }

        // }
        // else
        // {
        //     return Redirect::to('/influencer');
        // }
    }
    
    
    public function ads()
{
    
       $logged = Auth::user()->id;
        if($logged == '100')
        {
      
        $ads = DB::table('ads')->orderBy('id', 'desc')->get();
    return view('influencer.ads', compact('ads'));

        }

        else{
            return Redirect::to('/influencer');
        }
    
}

public function addAd(Request $request)
{
    $request->validate([
        'media' => 'required|file|mimes:jpeg,png,jpg,mp4,webm|max:10240',
        'link' => 'nullable|url'
    ]);

    $imageName = rand(1, 10) . $request->file('media')->getClientOriginalName();
    $imagePath = $request->file('media')->move('assets/images', $imageName); 
    
    DB::table('ads')->insert([
        'media' => $imageName, 
        'link' => $request->link,
        'status' => 0,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return back()->with('success', 'Ad uploaded');
}



public function toggleAd($id)
{
    $ad = DB::table('ads')->where('id', $id)->first();
    if ($ad) {
        DB::table('ads')->where('id', $id)->update([
            'status' => $ad->status ? 0 : 1,
            'updated_at' => now()
        ]);
    }
    return back()->with('success', 'Ad status changed');
}

public function deleteAd($id)
{
    $ad = DB::table('ads')->where('id', $id)->first();
    if ($ad) {
        Storage::disk('public')->delete($ad->media);
        DB::table('ads')->where('id', $id)->delete();
    }
    return back()->with('success', 'Ad deleted');
}

public function newsIndex() {
    $news = DB::table('news')->orderByDesc('created_at')->get();
    return view('influencer/news', compact('news'));
}

public function newsCreate() {
    return view('news.create');
}

public function newsStore(Request $request) {
    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/news'), $imageName);
    }

    DB::table('news')->insert([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imageName,
        'status' => $request->status ?? 'active',
    ]);

    return redirect()->route('news.index')->with('success', 'News added');
}

public function newsEdit($id) {
    $news = DB::table('news')->where('id', $id)->first();
    return view('influencer/newsedit', compact('news'));
}

public function newsUpdate(Request $request, $id) {
    $imageName = $request->old_image;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/news'), $imageName);
    }

    DB::table('news')->where('id', $id)->update([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imageName,
        'status' => $request->status,
    ]);

    return redirect()->route('news.index')->with('success', 'News updated');
}

public function newsDelete($id) {
    DB::table('news')->where('id', $id)->delete();
    return back()->with('success', 'News deleted');
}

public function update_bio(Request $request)
{
    $request->validate([
        'bio' => 'required|string|max:1000',
    ]);

    $user = User::find($request->influencer_id);
    if ($user) {
        $user->bio = $request->bio;
        $user->save();

        return Redirect::back()->with('message', 'Bio updated successfully');
    }

    return Redirect::back()->with('error', 'User not found');
}

}
