<?php

namespace App\Repositories\Eloquent;

use App\Models\Gender;
use App\Repositories\Contracts\GenderRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class GenderRepository extends BaseRepository implements GenderRepositoryInterface
{
    public function __construct(Gender $gender)
    {
        $this->model = $gender;
    }
}
