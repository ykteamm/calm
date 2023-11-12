<?php

namespace Database\Seeders;

use App\Models\Meditation;
use App\Models\MeditationTranslation;
use Illuminate\Database\Seeder;

class MeditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditation = Meditation::create([
            'meditator_id' => 1,
            'category_id' => 11
        ]);
        foreach (['uz', 'ru', 'en'] as $lang) {
            MeditationTranslation::create([
                'name' => $lang . " meditation",
                'object_id' => $meditation->id,
                'language_code' => $lang
            ]);
        }
    }
}
