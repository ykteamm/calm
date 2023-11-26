<?php

namespace App\Services;

use App\Models\User;

class AuthService 
{
    public function getUser($data): ?User
    {
        $phone = $data['phone'];
        return User::where('username', $phone)
        ->orWhere('email', $phone)
        ->orWhere('phone', $phone)
        ->first();
    }

    public function getUserByUsername()
    {
        
    }
}