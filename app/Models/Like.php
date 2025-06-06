<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    protected $connection = 'mysql';
    protected $table = 'likes';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];

    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }
}
