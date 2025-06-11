<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notification;

class Invite extends Model
{
    protected $connection = 'mysql';
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $fillable = ['accept', 'user_id', 'notification_id', 'community_id'];

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }

    public function notification(): HasOne
    {
        return $this->hasOne(Notification::class, 'notification_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
