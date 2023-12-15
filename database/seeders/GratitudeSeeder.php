<?php

namespace Database\Seeders;

use App\Models\Gratitude;
use App\Models\GratitudeTranslation;
use App\Models\Language;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class GratitudeSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $translations = [
            'uz' => [
                'Bugun nimalar qila olding ?',
                'Necha marta yaratganga shukur qilding ?',
                'Qancha tasbeh aytding ?',
                'Kimlarga yordam qila olding ?'
            ],
            'en' => [
                "What did you do today ?",
                'How many times have you thanked for creating ?',
                'How many rosaries did you say ?',
                'Who were you able to help ?'
            ],
            'ru' => [
                "Что вы делали сегодня ?",
                "Сколько раз вы благодарили за творчество ?",
                "Сколько четок ты произнес ?",
                "Кому ты смог помочь ?"
            ]
        ];
        for ($i = 0; $i < count($translations['uz']); $i++){
            $gratitude = Gratitude::create([]); 
            foreach ($langs as $lang) {
                GratitudeTranslation::create([
                    'name' => $translations[$lang->code][$i],
                    'object_id' => $gratitude->id,
                    'language_code' => $lang->code
                ]);
            }
        }
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Hmmasi yaxshi bo'ldi"
        // ]);
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Juda charchadim"
        // ]);
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Samarali kun"
        // ]);
    }
}
