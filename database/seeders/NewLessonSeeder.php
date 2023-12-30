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

        $nameser = [
            '8-mart',
            'Yangi yil',
            'Ustzolar kuni',
            'Mustaqillik',
        ];

        $medi = [
            'Katta g\'oya',
            'Zamin tanlash',
            'Hayyollardan qutulish',
            'Ichki ravonlik',
            'K\'ozlar katta ochiq',
            'Kechinmalarni neytrallash',
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
                            'name' => $medi[$i],
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                    }
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
            // }
        // }
    }
}
