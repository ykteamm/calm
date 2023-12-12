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
            'username' => 'abduser',
            'phone' => '931687098',
            'password' => Hash::make('1998'),
            'type' => UserTypeEnum::ADMIN
        ]); 
    }
}
