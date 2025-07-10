<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if(Auth::attempt($params)){
            $user = $this->userRepository->findByEmail($params['email']);
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

    public function logout(Request $request)
    {

    }
}
