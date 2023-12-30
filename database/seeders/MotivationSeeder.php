<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Motivation;
use App\Models\MotivationTranslation;
use Illuminate\Database\Seeder;

class MotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $motivations = [
            'uz' => [
                "Hayot uyqudir, o‘limla uyg‘onur inson. Sen shoshil, o‘lmasdan avval uyg‘on.",
                "Do‘st deb achchiq gapirganga emas, achchiqni shirin gapirganga aytiladi.",
                "Shamdek yosh to‘k, ko‘ngil uying charog‘on bo‘lsin."
            ],
            'en' => [
                "He who wants to climb to the top must be ready to get his hands dirty.",
                "What do people say? Yes, they say something. Whether you do it or not",
                "Life is today. Look at life realistically"
            ],
            'ru' => [
                "Тот, кто хочет подняться на вершину, должен быть готов испачкать руки",
                "Что говорят люди? Да, они что-то говорят. Делаете ли вы это или нет",
                "Жизнь есть сегодня. Смотри на жизнь реалистично"
            ]
        ];
        for ($i = 0; $i < count($motivations['uz']); $i++){
            $motivation = Motivation::create([
                'status' => 0
            ]);
            foreach ($langs as $lang) {
                MotivationTranslation::create([
                    'author' => "Rumiy",
                    'text' => $motivations[$lang->code][$i],
                    'object_id' => $motivation->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
