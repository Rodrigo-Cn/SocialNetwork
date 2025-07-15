<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\LogRepositoryInterface;
use App\Models\Log;

class LogRepository implements LogRepositoryInterface
{
    public function create(array $params){
        return Log::create($params);
    }
}
