<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCampaignDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'field_key',
        'field_value',
    ];

    // Belongs to a campaign
    public function campaign()
    {
        return $this->belongsTo(AdCampaign::class, 'campaign_id');
    }
}
