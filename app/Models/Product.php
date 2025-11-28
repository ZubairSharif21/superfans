<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
     protected $fillable = [
    'influencer_id',
    'external_product_id',
    'external_price_id',
];

}
