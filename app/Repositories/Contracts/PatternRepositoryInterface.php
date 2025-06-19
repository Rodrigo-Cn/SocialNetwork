<?php

namespace App\Repositories\Contracts;

interface PatternRepositoryInterface
{
    public function all();

    public function find(int|string $id);

    public function create(array $params);

    public function update(int|string $id, array $params);

    public function delete(int|string $id);
}
