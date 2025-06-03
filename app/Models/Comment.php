<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['text', 'image_url', 'user_id', 'post_id'];
}
