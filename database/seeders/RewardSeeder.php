<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            "Fantastik kino ko'rish",
            "Bon! ga borib nonushta qilish",
            "Amerikaga sayohat qilish",
            "Rep musiqa eshitish",
            "Basseynga borib cho'milish",
            "Jismoniy mashqlar bilan shug'ullanish",
            "Playstation o'ynash",
            "Futbol ko'rish",
            "Anjirda kechki ovqatlanish",
            "Meditatsiya tinglash"
        ];
        for ($i=0; $i < 10; $i++) {
            Reward::create([
                'user_id' => 1,
                'text' => $texts[$i]
            ]);
        }
    }
}
