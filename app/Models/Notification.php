<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Notification extends Model
{
    protected $connection = 'mysql';
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'user_id'];

    public function invite(): BelongsTo
    {
        return $this->belongsTo(Invite::class, 'notification_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
