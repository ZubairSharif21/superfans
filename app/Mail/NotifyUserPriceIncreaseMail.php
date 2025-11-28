<?php

namespace App\Mail;

use App\Models\User as Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUserPriceIncreaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private readonly Subscriber $subscriber, private readonly string $subscriptionPrice)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.prince-increase', ['subscriber' => $this->subscriber, 'subscriptionPrice' => $this->subscriptionPrice]);
    }
}
