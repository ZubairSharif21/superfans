<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StreamRoom extends Model
{
    protected $fillable = [
        'room_name', 'bio', 'tags', 'user_id'
    ];
}
