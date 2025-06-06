<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $connection = 'mysql';
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'category_id', 'id');
    }
}
