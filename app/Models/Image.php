<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $connection = 'mysql';
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['image_url', 'message_id'];

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }
}
