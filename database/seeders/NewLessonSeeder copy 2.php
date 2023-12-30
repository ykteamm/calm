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

class NewLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $medi = [
            'Katta g\'oya',
            'Zamin tanlash',
            'Hayyollardan qutulish',
            'Ichki ravonlik',
            'K\'ozlar katta ochiq',
            'Kechinmalarni neytrallash',
        ];

        $iro1 = [
            'Depressiyaga zarba',
            'Motivatsiya echim emas',
            'Ur yo qoch qizimi',
            'Sintetik iroda',
            'Miya qismlarini yoqish',
        ];

        $iro2 = [
            'Miyada parcha go\'sht - gippokampus',
            'Ikki neyro tarmoq',
            'Freyd va baxt',
            'Minnatdorchilik neyrokimyosi',
            'Baxt strategiyasi',
            'Sarob - hedonik mashina',
            'Salbiy tasavvur (Vizualizatsiya)',
            'Tana, Aql, Qalb',
        ];

        // $meditators = Meditator::all();
        // foreach ($meditators as $meditator) {
            // foreach ($meditator->meditations as $meditation) {
                for ($i=0; $i < 6; $i++) {
                    $data = [
                        'meditation_id' => 1,
                        'daily' => $i + 1,
                        'duration' => 600
                    ];
                    if ($i == 0) {
                        $data['block'] = 0;
                    }
                    $lesson = Lesson::create($data);
                    $langs = Language::all();
                    foreach ($langs as $lang) {
                        LessonTranslation::create([
                            'name' => $iro2[$i],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                    }
                    $lesson->audio()->create([
                        'path' => 'lessons/1.mp3',
                        'info' => '[]',
                        'type' => Lesson::AUDIO
                    ]);

                    $lesson->image()->create([
                        'path' => "lessons/ichki.jpg",
                        'info' => '[]',
                        'type' => Lesson::IMAGE
                    ]);
                }

                for ($i=0; $i < 5; $i++) {
                    $data = [
                        'meditation_id' => 3,
                        'daily' => $i + 1,
                        'duration' => 600
                    ];
                    if ($i == 0) {
                        $data['block'] = 0;
                    }
                    $lesson = Lesson::create($data);
                    $langs = Language::all();
                    foreach ($langs as $lang) {
                        LessonTranslation::create([
                            'name' => $iro1[$i],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                    }
                    $lesson->audio()->create([
                        'path' => 'lessons/1.mp3',
                        'info' => '[]',
                        'type' => Lesson::AUDIO
                    ]);

                    $lesson->image()->create([
                        'path' => "lessons/ichki.jpg",
                        'info' => '[]',
                        'type' => Lesson::IMAGE
                    ]);
                }

                for ($i=0; $i < 8; $i++) {
                    $data = [
                        'meditation_id' => 3,
                        'daily' => $i + 1,
                        'duration' => 600
                    ];
                    if ($i == 0) {
                        $data['block'] = 0;
                    }
                    $lesson = Lesson::create($data);
                    $langs = Language::all();
                    foreach ($langs as $lang) {
                        LessonTranslation::create([
                            'name' => $iro2[$i],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                    }
                    $lesson->audio()->create([
                        'path' => 'lessons/1.mp3',
                        'info' => '[]',
                        'type' => Lesson::AUDIO
                    ]);

                    $lesson->image()->create([
                        'path' => "lessons/ichki.jpg",
                        'info' => '[]',
                        'type' => Lesson::IMAGE
                    ]);
                }
            // }
        // }
    }
}
