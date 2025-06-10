<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Event extends Model
{
    protected $connection = 'mysql';
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'image_url', 'date', 'owner_id', 'category_id', 'community_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany('user_event', 'event_id', 'user_id');
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
