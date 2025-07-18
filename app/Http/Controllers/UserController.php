<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserCreateRequest $request)
    {
        $validated = $request->validated();
        return $this->userService->create($validated);
    }

    public function update(UserUpdateRequest $request)
    {

    }

    public function show(Request $request)
    {

    }
}
