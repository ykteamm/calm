<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            "Watch a fantasy movie",
            "Have breakfast at Bon!",
            "Travel to America",
            "Listen to rap music",
            "Swim in a pool",
            "Engage in physical exercises",
            "Play PlayStation",
            "Watch a football match",
            "Have dinner at Anjir",
            "Listen to meditation"
        ];

        for ($i=0; $i < 10; $i++) {
            Reward::create([
                'user_id' => 1,
                'text' => $texts[$i]
            ]);
        }
    }
}
