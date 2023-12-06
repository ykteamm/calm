<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected AuthService $authService;
    protected UserService $userService;

    public function __construct(
        AuthService $service,
        UserService $userService)
    {
        $this->authService = $service;
        $this->userService = $userService;
    }

    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();
        if ($this->userService->existsByColumn('phone', $data['phone'])) {
            return back()->with('error', 'Phone already exists');
        }
        return $this->userService->create($data, true)
            ->redirect('auth.login-view', 'auth.register-view');
    }

    public function login(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();
        if ($user = $this->userService->find(['phone' => $data['phone']])) {
            Auth::login($user);
            return redirect('/');
        }
        else return back()->with('error', 'Phone incorrect');
    }

    public function logout()
    {
        if(Auth::user()) {
            Auth::logout();
            return redirect('/');
        } else {
            return redirect('auth/login');
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }
}
