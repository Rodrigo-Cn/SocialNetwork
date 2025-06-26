<?php

namespace App\Services;

use App\Repositories\Contracts\GenderRepositoryInterface;

class GenderService
{

    protected GenderRepositoryInterface $genderRepository;

    public function __construct(GenderRepositoryInterface $genderRepository) {
        $this->genderRepository = $genderRepository;
    }
}
