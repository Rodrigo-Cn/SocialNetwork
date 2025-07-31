<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function register(array $params);

    public function findByEmail(string $email);

    public function update(array $params, string|int $id);

    public function updateAttempt(User $user);

    public function resetAttempt(User $user);

    public function findById(string|int $id);

    public function persistImage(string $imageUrl, string|int $i);
}
