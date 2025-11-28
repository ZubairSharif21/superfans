<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatbox extends Model
{
    public $timestamps = false;

    protected $table = 'chatbox';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'created_at'
    ];
}