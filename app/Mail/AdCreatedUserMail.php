<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Models\AdCampaign;

class AdCreatedUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ad;
    public $data;

    public function __construct(AdCampaign $ad, array $data = [])
    {
        $this->ad = $ad;
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Your ad has been created')
            ->view('emails.ad_created_user');
    }
}
