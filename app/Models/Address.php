<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $connection = 'mysql';
    protected $table = 'addresses';
    protected $primaryKey = 'id';
    protected $fillable = ['addressable_id', 'addressable_type','country', 'city', 'street', 'district'];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
