<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    protected $connection = 'mysql';
    protected $table = 'communities';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'image_url', 'type'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'community_id', 'id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_user', 'community_id', 'user_id')
            ->using(CommunityUser::class)
            ->withPivot('administrator', 'master');
    }

    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class, 'community_id', 'id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'community_id', 'id');
    }
}
