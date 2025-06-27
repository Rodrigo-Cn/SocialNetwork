<?php

namespace App\Http\Controllers;

use App\Services\MaritalStatusService;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    protected MaritalStatusService $maritalStatusService;

    public function __construct(MaritalStatusService $maritalStatusService)
    {
        $this->maritalStatusService = $maritalStatusService;
    }

    public function index()
    {
        return response()->json($this->maritalStatusService->getAll(), 200);
    }

    public function show(string $id)
    {
        return response()->json($this->maritalStatusService->findById($id), 200);
    }
}
