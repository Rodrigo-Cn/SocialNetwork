<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
