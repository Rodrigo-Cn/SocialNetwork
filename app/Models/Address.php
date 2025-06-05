<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $connection = 'mysql';
    protected $table = 'addresses';
    protected $primaryKey = 'id';
    protected $fillable = ['addressable_id', 'addressable_type','country', 'city', 'street', 'district'];

    public function addressable(){
        return $this->morphTo();
    }
}
