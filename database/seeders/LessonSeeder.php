<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\LessonTranslation;
use App\Models\Meditation;
use App\Models\MeditationTranslation;
use App\Models\Meditator;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditators = Meditator::all();
        foreach ($meditators as $meditator) {
            foreach ($meditator->meditations as $meditation) {
                $lesson = Lesson::create([
                    'meditation_id' => $meditation->id
                ]);
                $langs = Language::all();
                foreach ($langs as $lang) {
                    LessonTranslation::create([
                        'name' => Str::random(10),
                        'object_id' => $lesson->id,
                        'language_code' => $lang->code
                    ]);
                }
                $lesson->audio()->create([
                    'path' => "lessons/" . strtolower($meditator->firstname) . '.mp3',
                    'info' => '[]'
                ]);
            }
        }
    }
}
