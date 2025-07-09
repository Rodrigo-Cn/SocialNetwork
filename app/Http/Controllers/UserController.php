<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRequest $request)
    {
        $validated = $request->validated();
        return $this->userService->create($validated);
    }

    public function update(UserRequest $request)
    {

    }

    public function show(Request $request)
    {

    }
}
