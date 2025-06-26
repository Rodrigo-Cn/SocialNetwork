<?php

namespace App\Http\Controllers;

use App\Services\GenderService;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    protected GenderService $genderService;

    public function __construct(GenderService $genderService)
    {
        $this->genderService = $genderService;
    }

    public function index()
    {

    }

    public function show(string $id)
    {

    }
}
