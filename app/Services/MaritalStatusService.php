<?php

namespace App\Services;

use App\Repositories\Contracts\MaritalStatusRepositoryInterface;

class MaritalStatusService
{
    protected MaritalStatusRepositoryInterface $maritalStatusRepository;

    public function __construct(MaritalStatusRepositoryInterface $maritalStatusRepository)
    {
        $this->maritalStatusRepository = $maritalStatusRepository;
    }

    public function getAll()
    {
        return $this->maritalStatusRepository->all();
    }

    public function findById(int $id)
    {
        return $this->maritalStatusRepository->find($id);
    }
}
