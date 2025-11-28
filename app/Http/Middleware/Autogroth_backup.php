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
            $lastGrowth = $user->growth_start_time ?? Carbon::now()->subMinutes(180);
            $minutesSinceLastGrowth = Carbon::parse($lastGrowth)->diffInMinutes(now());

            if ($minutesSinceLastGrowth >= 1) {
                $posts = Post::where('influencer_id', $user->id)->get();

                foreach ($posts as $post) {
                    $postAgeInHours = Carbon::parse($post->created_at)->diffInHours(now());

                    if ($postAgeInHours < 48) {
                        $growthInterval = 1; // 1 min for posts 
                    } elseif ($postAgeInHours < 312) {
                        $growthInterval = 60; // 1 hour
                    } else {
                        $growthInterval = 660; // 11 hours for posts
                    }

                    $lastPostGrowth = $post->growth_start_time ?? Carbon::now()->subMinutes(2);

                    if (Carbon::parse($lastPostGrowth)->diffInMinutes(now()) >= $growthInterval) {
                        //  Random growth per post
                        switch ($gear) {
                            case 1:
                                $growth = rand(1, 5);
                                break;
                            case 2:
                                $growth = rand(5, 15);
                                break;
                            case 3:
                                $growth = rand(10, 35);
                                break;
                            case 4:
                                $growth = rand(50, 125);
                                break;
                            case 5:
                                $growth = rand(100, 250);
                                break;
                            default:
                                $growth = 0;
                                break;
                        }

                        $post->no_of_likes += $growth;
                        $post->growth_start_time = now();
                        $post->save();
                    }
                }

                // Followers growth -> Every 3 Hours
                if ($minutesSinceLastGrowth >= 180) {
                    $followerGrowth = rand(1, ceil($gear * 2))  * 7;
                    $user->no_of_followers += $followerGrowth;
                }

                $user->growth_start_time = now();
                $user->save();
            }
        }

        return $next($request);
    }
}
