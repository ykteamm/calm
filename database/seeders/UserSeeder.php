<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'phone' => '1998',
            'password' => Hash::make('password'),
            'type' => UserTypeEnum::SYSTEM_USER
        ]); 
    }
}
