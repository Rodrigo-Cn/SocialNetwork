<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $connection = 'mysql';
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['image_url', 'message_id'];
}
