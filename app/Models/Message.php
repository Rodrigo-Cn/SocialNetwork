<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    protected $connection = 'mysql';
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = ['text', 'follower', 'sender_id', 'receiver_id'];

    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'message_id', 'id');
    }
}
