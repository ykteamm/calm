<?php

namespace Database\Seeders;

use App\Enums\MeditationGroupEnum;
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

        $info = [
            [
                "Mushaklarni kuchaytirishning asosiy qoidalari",
                "To'g'ri tiklanish va dam olish usullari",
               " Suyuqlik balansini saqlash ahamiyati",
              "  Sog'lom energiya manbalari: tabiiy mahsulotlar",
               " Immunitetni mustahkamlash usullari",
                "Jismoniy faollik va metabolizm tezligi",
            ],
            [
                'Ovqatlanishning oltin qoidalari',
                'Vitamin va minerallarni to\'g\'ri tanlash',
                'Ovqatlanish odatlarini o\'zgartirishning sirlari',
                'Sog\'lom nonushta: kunning muvaffaqiyatli boshlanishi',
                'Shakar iste\'molini kamaytirish usullari',
            ],
            [
                "Mashqlar va ovqatlanishning mukammal muvozanati",
               " Kardio va kuch mashqlari: farqlari va afzalliklari",
                "Mashg'ulotdan oldin va keyingi ovqatlanish qoidalari",
               " Foydali yog'lar va protein iste'moli",
               " Sportchilar uchun energiya manbalari",
               " Metabolizmni tezlashtirish uchun mashqlar va ovqatlar",
                'Tana, Aql, Qalb',
            ],
        ];

        $imgs = [
            [
                'tanas',
                'dieta',
                'fitnes',
                'ichki',
                'kozlar-ochiq',
                'kechinmalar',
            ],
            [
                'dieta',
                'motiv-emas',
                'ur-yon-qoch',
                'sintetik-iroda',
                'miya-qismlari',
            ],
            [
                'fitnes',
                'neyro-tarmoq',
                'freyd-baxt',
                'neyro-kimyo',
                'baxt-strategiya',
                'sarob',
                'salbiy-tas',
                'tana-aql',
            ]
        ];

        $audios = [
          'tana.mp3',
           'diet.mp3',
            'fitnes.mp3'
        ];

        $langs = Language::all();
        $single = Meditation::where('group', MeditationGroupEnum::SINGLE)->get();
        $multiple = Meditation::where('group', MeditationGroupEnum::MULTIPLE)->get();

        foreach ($single as $ms) {
            $lesson = Lesson::create([
                'meditation_id' => $ms->id,
                'duration' => 600,
                'block' => 0
            ]);
            foreach ($langs as $lang) {
                LessonTranslation::create([
                    'name' => $ms->translation->name,
                    'object_id' => $lesson->id,
                    'language_code' => $lang->code
                ]);
            }
            foreach ($audios as $asd){
                $lesson->audio()->create([
                    'path' => 'lessons/'.$asd,
                    'info' => '[]',
                    'type' => Lesson::AUDIO
                ]);
            }

            $lesson->image()->create([
                'path' => "lessons/miya-qismlari.jpg",
                'info' => '[]',
                'type' => Lesson::IMAGE
            ]);
        }
        foreach ($multiple as $key => $m) {
            try {
                foreach ($info[$key] as $i => $value) {
                    $data = [
                        'meditation_id' => $m->id,
                        'duration' => 600,
                        'daily' => $i + 1
                    ];
                    if ($i != 0) {
                        $data['block'] = 1;
                    }
                    $lesson = Lesson::create($data);
                    foreach ($langs as $lang) {
                        LessonTranslation::create([
                            'name' => $value,
                            'object_id' => $lesson->id,
                            'language_code' => $lang->code
                        ]);
                    }
                    foreach ($audios as $ad){
                        $lesson->audio()->create([
                            'path' => 'lessons/'.$ad,
                            'info' => '[]',
                            'type' => Lesson::AUDIO
                        ]);
                    }
                    $lesson->image()->create([
                        'path' => "lessons/".$imgs[$key][$i].".png",
                        'info' => '[]',
                        'type' => Lesson::IMAGE
                    ]);
                }
            } catch (\Throwable $th) {
                dd($key, $data);
            }
        }



        // $medi = [
        //     'Katta g\'oya',
        //     'Zamin tanlash',
        //     'Hayollardan qutulish',
        //     'Ichki ravonlik',
        //     'Ko\'zlar katta ochiq',
        //     'Kechinmalarni neytrallash',
        // ];

        // $medi_img = [
        //     'kattas',
        //     'zamin',
        //     'hayol-qutulish',
        //     'ichki',
        //     'kozlar-ochiq',
        //     'kechinmalar',
        // ];

        // $iro1 = [
        //     'Depressiyaga zarba',
        //     'Motivatsiya yechim emas',
        //     'Ur yo qoch tizimi',
        //     'Sintetik iroda',
        //     'Miya qismlarini yoqish',
        // ];

        // $iro1_img = [
        //     'depressiya-zarba',
        //     'motiv-emas',
        //     'ur-yon-qoch',
        //     'sintetik-iroda',
        //     'miya-qismlari',
        // ];

        // $iro2 = [
        //     'Miyada parcha go\'sht - Gippokampus',
        //     'Ikki neyro tarmoq',
        //     'Freyd va baxt',
        //     'Minnatdorchilik neyrokimyosi',
        //     'Baxt strategiyasi',
        //     'Sarob - hedonik mashina',
        //     'Salbiy tasavvur (Vizualizatsiya)',
        //     'Tana, Aql, Qalb',
        // ];

        // $iro2_img = [
        //     'bir-parcha',
        //     'neyro-tarmoq',
        //     'freyd-baxt',
        //     'neyro-kimyo',
        //     'baxt-strategiya',
        //     'sarob',
        //     'salbiy-tas',
        //     'tana-aql',
        // ];

        // // $meditators = Meditator::all();
        // // foreach ($meditators as $meditator) {
        //     // foreach ($meditator->meditations as $meditation) {
        //         for ($i=0; $i < 6; $i++) {
        //             $data = [
        //                 'meditation_id' => 1,
        //                 'daily' => $i + 1,
        //                 'duration' => 600
        //             ];
        //             if ($i == 0) {
        //                 $data['block'] = 0;
        //             }
        //             $lesson = Lesson::create($data);
        //             $langs = Language::all();
        //             foreach ($langs as $lang) {
        //                 LessonTranslation::create([
        //                     'name' => $medi[$i],
        //                     'object_id' => $lesson->id,
        //                     'language_code' => $lang->code
        //                 ]);
        //             }
        //             $lesson->audio()->create([
        //                 'path' => 'lessons/1.mp3',
        //                 'info' => '[]',
        //                 'type' => Lesson::AUDIO
        //             ]);

        //             $lesson->image()->create([
        //                 'path' => "lessons/".$medi_img[$i].".jpg",
        //                 'info' => '[]',
        //                 'type' => Lesson::IMAGE
        //             ]);
        //         }

        //         for ($i=0; $i < 5; $i++) {
        //             $data = [
        //                 'meditation_id' => 2,
        //                 'daily' => $i + 1,
        //                 'duration' => 600
        //             ];
        //             if ($i == 0) {
        //                 $data['block'] = 0;
        //             }
        //             $lesson = Lesson::create($data);
        //             $langs = Language::all();
        //             foreach ($langs as $lang) {
        //                 LessonTranslation::create([
        //                     'name' => $iro1[$i],
        //                     'object_id' => $lesson->id,
        //                     'language_code' => $lang->code
        //                 ]);
        //             }
        //             $lesson->audio()->create([
        //                 'path' => 'lessons/1.mp3',
        //                 'info' => '[]',
        //                 'type' => Lesson::AUDIO
        //             ]);

        //             $lesson->image()->create([
        //                 'path' => "lessons/".$iro1_img[$i].".jpg",
        //                 'info' => '[]',
        //                 'type' => Lesson::IMAGE
        //             ]);
        //         }

        //         for ($i=0; $i < 8; $i++) {
        //             $data = [
        //                 'meditation_id' => 3,
        //                 'daily' => $i + 1,
        //                 'duration' => 600
        //             ];
        //             if ($i == 0) {
        //                 $data['block'] = 0;
        //             }
        //             $lesson = Lesson::create($data);
        //             $langs = Language::all();
        //             foreach ($langs as $lang) {
        //                 LessonTranslation::create([
        //                     'name' => $iro2[$i],
        //                     'object_id' => $lesson->id,
        //                     'language_code' => $lang->code
        //                 ]);
        //             }
        //             $lesson->audio()->create([
        //                 'path' => 'lessons/1.mp3',
        //                 'info' => '[]',
        //                 'type' => Lesson::AUDIO
        //             ]);

        //             $lesson->image()->create([
        //                 'path' => 'lessons/'.$iro2_img[$i].'.jpg',
        //                 'info' => '[]',
        //                 'type' => Lesson::IMAGE
        //             ]);
        //         }


        //     // }
        // // }
    }
}
