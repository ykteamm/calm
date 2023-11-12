<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonTranslation;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = Lesson::create([
            'meditation_id' => 1
        ]);
        foreach (['uz', 'ru', 'en'] as $lang) {
            LessonTranslation::create([
                'name' => $lang . " lesson",
                'object_id' => $lesson->id,
                'language_code' => $lang
            ]);
        }
    }
}
