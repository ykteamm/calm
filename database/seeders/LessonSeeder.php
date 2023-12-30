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


        $meditators = Meditator::all();
        foreach ($meditators as $meditator) {

            foreach ($meditator->meditations as $key => $meditation) {


                $langs = Language::all();

                if($meditation->id == 1)
                {
                    foreach ($medi as $k => $n) {
                        foreach ($langs as $lang) {
                            $data = [
                                'meditation_id' => $meditation->id,
                                'daily' => $k + 1,
                                'duration' => 600
                            ];
                            if ($k == 0) {
                                $data['block'] = 0;
                            }

                            $lesson = Lesson::create($data);

                        LessonTranslation::create([
                            'name' => $n[$k],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                        $lesson->audio()->create([
                            'path' => 'lessons/jack.mp3',
                            'info' => '[]',
                            'type' => Lesson::AUDIO
                        ]);

                        $lesson->image()->create([
                            'path' => "lesson/zamin.jpg",
                            'info' => '[]',
                            'type' => Lesson::IMAGE
                        ]);
                    }
                }
                }elseif($meditation->id == 2)
                {
                    foreach ($iro1 as $o => $y) {
                        foreach ($langs as $lang) {
                            $data = [
                                'meditation_id' => $meditation->id,
                                'daily' => $o + 1,
                                'duration' => 600
                            ];
                            if ($o == 0) {
                                $data['block'] = 0;
                            }

                            $lesson = Lesson::create($data);

                        LessonTranslation::create([
                            'name' => $y[$o],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);

                        $lesson->audio()->create([
                            'path' => 'lessons/jack.mp3',
                            'info' => '[]',
                            'type' => Lesson::AUDIO
                        ]);

                        $lesson->image()->create([
                            'path' => "lesson/katta.jpg",
                            'info' => '[]',
                            'type' => Lesson::IMAGE
                        ]);
                    }
                }
                }elseif($meditation->id == 3)
                {
                    foreach ($iro2 as $d => $s) {
                        foreach ($langs as $lang) {
                            $data = [
                                'meditation_id' => $meditation->id,
                                'daily' => $d + 1,
                                'duration' => 600
                            ];
                            if ($d == 0) {
                                $data['block'] = 0;
                            }

                            $lesson = Lesson::create($data);

                        LessonTranslation::create([
                            'name' => $s[$d],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                        $lesson->audio()->create([
                            'path' => 'lessons/jack.mp3',
                            'info' => '[]',
                            'type' => Lesson::AUDIO
                        ]);

                        $lesson->image()->create([
                            'path' => "lesson/ichki.jpg",
                            'info' => '[]',
                            'type' => Lesson::IMAGE
                        ]);
                    }
                }
                }


                // $lesson->audio()->create([
                //     'path' => "lessons/" . strtolower($meditator->firstname) . '.mp3',
                //     'info' => '[]'
                // ]);
            }
        }
    }
}
