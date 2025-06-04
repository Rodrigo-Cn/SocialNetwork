<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'marital_status';
    protected $primaryKey = 'id';
    protected $fillable = ['status'];
}
