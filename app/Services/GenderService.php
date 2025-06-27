<?php

namespace App\Services;

use App\Repositories\Contracts\GenderRepositoryInterface;

class GenderService
{

    protected GenderRepositoryInterface $genderRepository;

    public function __construct(GenderRepositoryInterface $genderRepository) {
        $this->genderRepository = $genderRepository;
    }

    public function getAll()
    {
        return $this->genderRepository->all();
    }

    public function findById(int $id)
    {
        return $this->genderRepository->find($id);
    }
}
