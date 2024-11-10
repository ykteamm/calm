<?php

namespace Database\Seeders;

use App\Models\Aim;
use Illuminate\Database\Seeder;

class AimSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            "Sleep 5 hours a day",
            "Walk 10,000 steps a day",
            "Avoid sugar for a week",
            "Check in with relatives",
            "Go to work earlier",
            "Learn 20 new vocabulary words",
            "Help those in need",
            "Minimize phone usage",
            "Stay away from fast food as much as possible",
            "Engage in regular physical exercises"
        ];

        for ($i=0; $i < 10; $i++) {
            Aim::create([
                'user_id' => 1,
                'text' => $texts[$i]
            ]);
        }
    }
}
