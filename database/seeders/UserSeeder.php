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
            'firstname' => 'Abrorbek',
            'lastname' => 'Toshpolatov',
            'username' => 'Abror_13',
            'phone' => '007',
            'password' => Hash::make('007'),
            'type' => UserTypeEnum::ADMIN
        ]);
        User::create([
            'firstname' => 'To\'lqin',
            'lastname' => 'Ergashev',
            'phone' => '998990821015',
            'password' => Hash::make('1111'),
            'type' => UserTypeEnum::ADMIN
        ]);
    }
}
