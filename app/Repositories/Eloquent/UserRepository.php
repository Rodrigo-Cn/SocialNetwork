<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function register(array $params)
    {
         return User::create($params);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
