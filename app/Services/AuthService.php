<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $params)
    {
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
    }
}
