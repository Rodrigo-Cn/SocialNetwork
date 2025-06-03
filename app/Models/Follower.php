<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $connection = 'mysql';
    protected $table = 'followers';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'followed_id', 'best_friend', 'blocked'];
}
