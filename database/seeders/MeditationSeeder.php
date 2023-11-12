<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lesson;
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
        $meditators = Meditator::all();
        $categoryRandom = Category::randomBuilder();

        foreach ($meditators as $m) {
            $meditation = Meditation::create([
                'meditator_id' => $m->id,
                'category_id' => $categoryRandom->random()->id
            ]);
            MeditationTranslation::create([
                'name' => "$meditation->id meditation",
                'object_id' => $meditation->id,
                'language_code' => 'en'
            ]);
            for ($i=1; $i < 4; $i++) { 
                $lesson = Lesson::create([
                    'meditation_id' => $meditation->id
                ]);
                $lesson->audios()->create([
                    'name' => "audio$i",
                    'extension' => 'mp3',
                    'duration' => '10.3',
                    'folder' => 'audios'
                ]);
            }
        }
    }
}
