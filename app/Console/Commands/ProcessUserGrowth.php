<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class ProcessUserGrowth extends Command
{
    protected $signature = 'growth:process';
    protected $description = 'Process user growth for followers and likes.';

    public function handle()
    {
        $users = User::where('growth_status', 'active')->get();

        foreach ($users as $user) {
            $gear = $user->growth_gear_level ?? 1;
            $followers = $user->no_of_followers ?? 0;

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
                    $randomFactor = rand(80, 120) / 100;
                    $gearMultiplier = match ($gear) {
                        1 => 0.5,
                        2 => 1,
                        3 => 1.5,
                        4 => 2.5,
                        5 => 3.5,
                        default => 1,
                    };

                    $likeGrowth = (int) max(1, $likeBase * $gearMultiplier * $randomFactor);
                    $post->no_of_likes += $likeGrowth;
                    $post->growth_start_time = now();
                    $post->save();
                }
            }

            $lastFollowerGrowth = $user->follower_growth_time ?? Carbon::now()->subMinutes(180);
            $minutesSinceLastFollowerGrowth = Carbon::parse($lastFollowerGrowth)->diffInMinutes(now());

            if ($minutesSinceLastFollowerGrowth >= 150) {
                $followerBase = max(1, ceil($followers * 0.005));
                $randomFactor = rand(80, 120) / 100;
                $gearMultiplier = match ($gear) {
                    1 => 0.5,
                    2 => 1,
                    3 => 1.5,
                    4 => 2,
                    5 => 3,
                    default => 1,
                };

                $followerGrowth = (int) max(1, $followerBase * $gearMultiplier * $randomFactor);
                $user->no_of_followers += $followerGrowth;
                $user->follower_growth_time = now();
            }

            $user->save();
        }

        $this->info('User growth processed successfully.');
    }
}
