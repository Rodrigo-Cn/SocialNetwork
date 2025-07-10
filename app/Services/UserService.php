<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Exception;


class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $params)
    {
        try {
            $response = DB::transaction(function() use ($params){
                $user = $this->userRepository
                    ->register([
                        'name' => $params['name'],
                        'date_birth' => $params['date_birth'],
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
                    'user' => $user,
                    'token' => $token->plainTextToken
                ], 201);
            });
            return $response;
        } catch(Exception $exception) {
            //Log::create
            //'message' => $exception->getMessage(),
            //'file' => $exception->getFile(),
            //'line' => $exception->getLine(),
            //return response()->json([
                //'message' => 'Ocorreu um erro interno. Contate o suporte.'
            //], 500);
            return $exception;
        }
    }
}
