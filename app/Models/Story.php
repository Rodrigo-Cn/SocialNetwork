<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    protected $connection = 'mysql';
    protected $table = 'stories';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'image_url', 'video_url', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
