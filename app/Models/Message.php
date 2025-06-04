<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $connection = 'mysql';
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = ['text', 'follower', 'sender_id', 'receiver_id'];
}
