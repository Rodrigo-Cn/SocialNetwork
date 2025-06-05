<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'mysql';
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'image_url', 'date', 'owner_id', 'category_id', 'community_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function users(){
        return $this->belongsToMany('user_event', 'event_id', 'user_id');
    }

    public function community(){
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }

    public function adress(){
        return $this->morphOne(Address::class, 'addressable');
    }
}
