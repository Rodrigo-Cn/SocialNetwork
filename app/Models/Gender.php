<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'genders';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
