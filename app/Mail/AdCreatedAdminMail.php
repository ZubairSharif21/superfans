<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Models\AdCampaign;

class AdCreatedAdminMail extends Mailable
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
        return $this->subject('New ad submitted for approval')
            ->view('emails.ad_created_admin');
    }
}
