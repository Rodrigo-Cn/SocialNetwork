<?php

namespace App\Repositories\Eloquent;

use App\Models\MaritalStatus;
use App\Repositories\Contracts\MaritalStatusRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class MaritalStatusRepository extends BaseRepository implements MaritalStatusRepositoryInterface
{
    public function __construct(MaritalStatus $maritalStatus)
    {
        $this->model = $maritalStatus;
    }
}
