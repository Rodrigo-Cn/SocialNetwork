<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $fillable = ['reference', 'data', 'user_id', 'action_time'];
}
