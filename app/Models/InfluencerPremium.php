<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfluencerPremium extends Model
{
    use HasFactory;

    protected $table = 'influencer_premium';

    protected $fillable = [
        'user_id',
        'influencer_id',
        'stripe_charge_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencer_id');
    }
}
