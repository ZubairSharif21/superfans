<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class AutoGrowthMiddleware
{
    public function handle($request, Closure $next)
    {
        $users = User::where('growth_status', 'active')->get();

        foreach ($users as $user) {
            $gear = $user->growth_gear_level ?? 1;
            $followers = $user->no_of_followers ?? 0;
            $lastGrowth = $user->growth_start_time ?? Carbon::now()->subMinutes(180);
            $minutesSinceLastGrowth = Carbon::parse($lastGrowth)->diffInMinutes(now());

            if ($minutesSinceLastGrowth >= 1) {
                $posts = Post::where('influencer_id', $user->id)->get();

                foreach ($posts as $post) {
                    $postAgeInHours = Carbon::parse($post->created_at)->diffInHours(now());

                    if ($postAgeInHours < 48) {
                        $growthInterval = 1;
                    } elseif ($postAgeInHours < 312) {
                        $growthInterval = 60;
                    } else {
                        $growthInterval = 660;
                    }

                    $lastPostGrowth = $post->growth_start_time ?? Carbon::now()->subMinutes(2);

                    if (Carbon::parse($lastPostGrowth)->diffInMinutes(now()) >= $growthInterval) {
                        $likeBase = ceil($followers * 0.005);
                        $gearMultiplier = match ($gear) {
                            1 => 0.5,
                            2 => 1,
                            3 => 1.5,
                            4 => 2.5,
                            5 => 3.5,
                            default => 1,
                        };

                        $likeGrowth = rand($likeBase, $likeBase * 2) * $gearMultiplier;
                        $post->no_of_likes += (int) $likeGrowth;
                        $post->growth_start_time = now();
                        $post->save();
                    }
                }

                if ($minutesSinceLastGrowth >= 180) {
                    $followerBase = ceil($followers * 0.005);
                    $gearMultiplier = match ($gear) {
                        1 => 0.5,
                        2 => 1,
                        3 => 1.5,
                        4 => 2,
                        5 => 3,
                        default => 1,
                    };

                    $followerGrowth = rand($followerBase, $followerBase * 2) * $gearMultiplier;
                    $user->no_of_followers += (int) $followerGrowth;
                }

                $user->growth_start_time = now();
                $user->save();
            }
        }

        return $next($request);
    }
}
