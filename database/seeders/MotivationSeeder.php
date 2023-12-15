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
                "Cho'qqiga chiqishni hohlagan odam qo'li shilinishiga tayyor turishi kerak", 
                "Hech qachon oddiy hayot tarzidan uyalma", 
                "Odamlar nima deydi? Ha albatta biron nima deydi. Qilsang ham qilmasang ham",
                "Hayot bugundir. Hayotga real qara"
            ],
            'en' => [
                "He who wants to climb to the top must be ready to get his hands dirty.",
                "Never be ashamed of the simple way of life",
                "What do people say? Yes, they say something. Whether you do it or not",
                "Life is today. Look at life realistically"
            ],
            'ru' => [
                "Тот, кто хочет подняться на вершину, должен быть готов испачкать руки",
                "Никогда не стыдись простого образа жизни",
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
                    'author' => "Olim Valiyev",
                    'text' => $motivations[$lang->code][$i],
                    'object_id' => $motivation->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
