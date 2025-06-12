<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MaritalStatus extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'marital_status';
    protected $primaryKey = 'id';
    protected $fillable = ['status'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'marital_status_id', 'id');
    }
}
