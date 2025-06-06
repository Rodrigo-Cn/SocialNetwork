<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    protected $connection = 'mysql';
    protected $table = 'communities';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'image_url', 'type'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'community_id', 'id');
    }
}
