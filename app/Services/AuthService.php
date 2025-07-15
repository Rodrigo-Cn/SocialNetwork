<?php

namespace App\Services;

use App\Repositories\Contracts\LogRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthService
{
    protected UserRepositoryInterface $userRepository;
    protected LogRepositoryInterface $logRepository;

    public function __construct(UserRepositoryInterface $userRepository, LogRepositoryInterface $logRepository)
    {
        $this->userRepository = $userRepository;
        $this->logRepository = $logRepository;
    }

    public function login(array $params)
    {
        try {
            $user = $this->userRepository->findByEmail($params['email']);

            if($user->attempt > 5){
                return response()->json([
                    'success' => false,
                    'message' => 'Máximo de tentativas. Contate o suporte.'
                ], 401);
            }

            $user = $this->userRepository->updateAttempt($user);

            if (Auth::attempt($params)) {

                if (!$user) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Usuário não encontrado.'
                    ], 404);
                }

                $token = $user->createToken('auth_token');

                $this->userRepository->resetAttempt($user);

                return response()->json([
                    'success' => true,
                    'token' => $token->plainTextToken
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'E-mail ou senha inválidos.'
            ], 401);
        } catch(\Throwable $throwable){
            $this->logRepository->create([
                'reference' => 'UserController@create',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                    'ip' => request()->ip(),
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
