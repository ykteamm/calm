<?php

namespace Database\Seeders;

use App\Models\Meditator;
use Illuminate\Database\Seeder;

class MeditatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meditator::create([
            'firstname' => "Abdumannon",
            'lastname' => "Norboyev"
        ]);
    }
}
