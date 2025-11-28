<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPayment extends Model
{
    protected $fillable = ['user_id', 'ad_id', 'amount', 'method'];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
