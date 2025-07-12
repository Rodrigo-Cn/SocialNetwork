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

    public function update(array $params, int $id)
    {
         return  $this->findById($id)->update($params);
    }

    public function updateAttempt(User $user)
    {
        $user->increment('attempt');
        $user->refresh();
        return $user;
    }

    public function resetAttempt(User $user)
    {
        $user->attempt = 0;
        $user->save();
        return true;
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
