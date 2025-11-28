<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCampaign extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'status', 'media', 'objective', 'budget','user_id'];

    // Relationship: a campaign can have many details
    public function details()
    {
        return $this->hasMany(AdCampaignDetail::class, 'campaign_id');
    }
}
