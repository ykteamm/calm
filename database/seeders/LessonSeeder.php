<?php

namespace Database\Seeders;

use App\Models\Language;
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
        $langs = Language::all();
        $lesson = Lesson::create([
            'meditation_id' => 1
        ]);
        foreach ($langs as $lang) {
            LessonTranslation::create([
                'name' => $lang->code . " lesson",
                'object_id' => $lesson->id,
                'language_code' => $lang->code
            ]);
        }
    }
}
