<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(AuthRequest $request)
    {
        $params = $request->validated();

        try {
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

        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout realizado com sucesso.'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }
}
