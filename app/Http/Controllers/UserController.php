<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserPersistProfileImageRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Contracts\LogRepositoryInterface;
use App\Services\UserService;
use Carbon\Carbon;

class UserController extends Controller
{
    protected UserService $userService;
    protected LogRepositoryInterface $logRepository;

    public function __construct(UserService $userService, LogRepositoryInterface $logRepository)
    {
        $this->userService = $userService;
        $this->logRepository = $logRepository;
    }

    public function register(UserCreateRequest $request)
    {
        $validated = $request->validated();
        return $this->userService->create($validated);
    }

    public function update(UserUpdateRequest $request)
    {

    }

    public function storeImageProfile(UserPersistProfileImageRequest $request)
    {
        try{
            $validated = $request->validated();
            $response = $this->userService->persistProfileImage($validated);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch (\Throwable $throwable){
            $this->logRepository->create([
                'reference' => 'UserController@storeImageProfile',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $validated,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                    'ip' => request()->ip()
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }
}
