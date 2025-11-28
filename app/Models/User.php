<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use MongoDB\Driver\Monitoring\Subscriber;
use App\Notifications\CustomResetPassword;
use Creagia\LaravelRedsys\Concerns\InteractsWithRedsysCards;


class User extends Authenticatable
{
    use HasFactory, Notifiable, InteractsWithRedsysCards;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'role',
        'surname',
        'nationality',
        'bank_account',
        'paypal_account',
        'price_of_subscription',
        'profile_picture',
        'cover_picture',
        'Influencer_networks',
        'Influencer_networks_profile_links',
        'username_URL',
        'referred_influencer',
        'instagram_link',
        'earnings',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function influencers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'influencer_id')
            ->withPivot('amount')
            ->withTimestamps();
    }

    /**
     * Get the subscribers for the influencer.
     */
    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'influencer_id', 'user_id')
            ->withPivot('amount')
            ->withTimestamps();
    }

    public function stripeSubscriptions(): BelongsToMany
    {
        return $this->belongsToMany(StripeSubscription::class, 'user_id');
    }
    
    public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomResetPassword($token));
}

public function influencerPayments()
{
    return $this->hasMany(\App\Models\InfluencerPremium::class);
}

public function hasPaidInfluencer($influencerId)
{
    return $this->influencerPayments()
        ->where('influencer_id', $influencerId)
        ->exists();
}

public function referredUsers()
{
    return $this->hasMany(User::class, 'referred_influencer', 'username_URL');
}

public function blockedUsers()
{
    return $this->belongsToMany(User::class, 'user_blocks', 'blocker_id', 'blocked_id')->withTimestamps();
}

public function blockedByUsers()
{
    return $this->belongsToMany(User::class, 'user_blocks', 'blocked_id', 'blocker_id')->withTimestamps();
}

public function hasBlocked($userId)
{
    return $this->blockedUsers()->where('blocked_id', $userId)->exists();
}

public function isBlockedBy($userId)
{
    return $this->blockedByUsers()->where('blocker_id', $userId)->exists();
}



}
