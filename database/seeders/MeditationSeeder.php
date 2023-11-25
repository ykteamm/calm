<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\Meditation;
use App\Models\MeditationTranslation;
use App\Models\Meditator;
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
        $langs = Language::all();
        $meditators = Meditator::all();
        $categoryRandom = Category::randomBuilder();

        foreach ($meditators as $m) {
            $meditation = Meditation::create([
                'meditator_id' => $m->id,
                'category_id' => $categoryRandom->random()->id
            ]);
            foreach ($langs as $lang) {
                MeditationTranslation::create([
                    'name' => "$meditation->id meditation",
                    'object_id' => $meditation->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
