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
            'phone' => '007',
            'password' => Hash::make('007'),
            'type' => UserTypeEnum::MEDITATOR
        ]);
        User::create([
            'firstname' => 'abduser',
            'lastname' => 'abduser',
            'phone' => '998990821015',
            'password' => Hash::make('1111'),
            'type' => UserTypeEnum::MEDITATOR
        ]);
    }
}
