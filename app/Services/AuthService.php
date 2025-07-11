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
        if (Auth::attempt($params)) {
            $user = $this->userRepository->findByEmail($params['email']);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuário não encontrado.'
                ], 404);
            }

            $token = $user->createToken('auth_token');

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
