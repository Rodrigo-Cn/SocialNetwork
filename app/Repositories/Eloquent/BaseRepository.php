<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PatternRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements PatternRepositoryInterface
{
    protected Model $model;

    public function all()
    {
        return $this->model->all();
    }

    public function find(int|string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $params)
    {
        return $this->model->create($params);
    }

    public function update(int|string $id, array $params)
    {
        return $this->find($id)->update($params);
    }


    public function delete(int|string $id)
    {
        return $this->find($id)->delete();
    }

}
