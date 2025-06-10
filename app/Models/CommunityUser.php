<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommunityUser extends Model
{
    protected $connection = 'mysql';
    protected $table = 'community_user';
    protected $primaryKey = 'id';
    protected $fillable = ['administrator', 'master', 'user_id', 'community_id'];

    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }

    public function community():BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_id', 'id');
    }
}
