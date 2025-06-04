<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'mysql';
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'image_url', 'date', 'owner_id', 'category_id'];
}
