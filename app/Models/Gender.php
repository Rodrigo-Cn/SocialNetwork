<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'genders';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'gender_id', 'id');
    }
}
