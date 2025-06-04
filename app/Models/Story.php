<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $connection = 'mysql';
    protected $table = 'stories';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'image_url', 'video_url', 'user_id'];
}
