<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $connection = 'mysql';
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = ['country', 'state', 'post_id'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
