<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityUser extends Model
{
    protected $connection = 'mysql';
    protected $table = 'community_user';
    protected $primaryKey = 'id';
    protected $fillable = ['administrator', 'master', 'user_id', 'community_id'];
}
