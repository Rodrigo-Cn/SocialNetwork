<?php

namespace App\Services;

use App\Repositories\Contracts\LogRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Exception;
use Throwable;

class UserService
{
    protected UserRepositoryInterface $userRepository;
    protected LogRepositoryInterface $logRepository;

    public function __construct(UserRepositoryInterface $userRepository, LogRepositoryInterface $logRepository)
    {
        $this->userRepository = $userRepository;
        $this->logRepository = $logRepository;
    }

    public function create(array $params)
    {
        try {
            $response = DB::transaction(function() use ($params){
                $user = $this->userRepository
                    ->register([
                        'name' => $params['name'],
                        'date_birth' => $params['datebirth'],
                        'job' => $params['job'],
                        'email' => $params['email'],
                        'username' => $params['username'],
                        'password' => Hash::make($params['password']),
                        'phonenumber' => $params['phonenumber'],
                        'online' => 0,
                        'activate' => 1,
                        'marital_status' => 1
                    ]);

                $token = $user->createToken('auth_token');

                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'token' => $token->plainTextToken
                ], 201);
            });
            return $response;
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'UserController@create',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'trace' => $throwable->getTraceAsString(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
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
