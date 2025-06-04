<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $connection = 'mysql';
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $fillable = ['accept', 'user_id', 'notification_id', 'community_id'];
}
