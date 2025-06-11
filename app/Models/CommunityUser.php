<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityUser extends Pivot
{
    protected $connection = 'mysql';
    protected $table = 'community_user';
    protected $primaryKey = 'id';

    protected $fillable = ['administrator', 'master', 'user_id', 'community_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
