<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // import User model

class ProductPurchase extends Model
{
    
    protected $fillable = [
    'user_id',
    'product_id',
    'influencer_username',
    'amount',
    'stripe_charge_id',
    'referred_influencer_id',
    'guest_email',
    'shipping_country',
    'shipping_city',
    'shipping_zip',
    'shipping_address',
    'status',
    'order_id',
     ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
