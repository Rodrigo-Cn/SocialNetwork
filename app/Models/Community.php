<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $connection = 'mysql';
    protected $table = 'communities';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'image_url', 'type'];
}
