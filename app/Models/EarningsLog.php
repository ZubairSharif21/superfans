<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarningsLog extends Model
{
    protected $fillable = ['user_id', 'source_user_id', 'amount', 'earning_type'];

    public function sourceUser()
    {
        return $this->belongsTo(User::class, 'source_user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
