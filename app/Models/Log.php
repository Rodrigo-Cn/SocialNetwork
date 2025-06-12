<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $fillable = ['reference', 'data', 'user_id', 'action_time'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
