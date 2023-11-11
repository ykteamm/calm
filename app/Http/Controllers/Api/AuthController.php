<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $service)
    {
        $this->authService = $service;
    }

    public function login (LoginRequest $loginRequest)
    {
        if(Auth::attempt($data = $loginRequest->validated())) {
            $user = $this->authService->getUser($data);
            return ['token' => $user->createToken('secret')->plainTextToken];
        } else {
            return ['message' => 'User not found'];
        }
    }
}
