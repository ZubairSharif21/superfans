<?php

namespace App\Jobs;

use App\Mail\NotifyUserPriceIncreaseMail;
use App\Models\User as Influencer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailPriceIncreaseToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly int $userId)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $influencer = Influencer::find($this->userId);
        $subscribers = $influencer->subscribers;

        $emailsSend = 0;
        foreach ($subscribers as $key => $subscriber) {
            if ($emailsSend === 10) {
                sleep(5);
                $emailsSend = 0;
            }
            \Mail::to($subscriber->email)->send(new NotifyUserPriceIncreaseMail($subscriber,$influencer->price_of_subscription));
            $emailsSend++;
        }

    }
}
