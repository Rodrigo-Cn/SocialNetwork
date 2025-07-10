<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\PatternRepositoryInterface;

interface UserRepositoryInterface
{
    public function register(array $params);

    public function findByEmail(string $email);
}
