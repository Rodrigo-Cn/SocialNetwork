<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\PatternRepositoryInterface;

interface LocationRepositoryInterface extends PatternRepositoryInterface
{
    public function findByPostId(int $id);
}
