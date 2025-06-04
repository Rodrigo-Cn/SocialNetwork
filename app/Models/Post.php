<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mysql';
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'image_url', 'video_url', 'status', 'attached_url', 'highlight', 'user_id', 'community_id'];
}
