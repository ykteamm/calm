<?php

namespace Database\Seeders;
use App\Models\QuestionTranslation;
use App\Models\Language;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $questions = [
            'uz' => [
                "Ko'p stress qilasizmi ?", 
                "Bir kunda necha soat uxlaysiz ?", 
                "Odatda nimalar diqqatingizni jamlashga halal beradi ?",
                "Qanday holatlarda kayfiyatingiz buziladi ?"
            ],
            'en' => [
                "Do you stress a lot?",
                "How many hours do you sleep a day?",
                "What usually allows you to concentrate?",
                "In what situations do you get upset?"
            ],
            'ru' => [
                "Вы сильно напрягаетесь?",
                "Сколько часов в сутки вы спите?",
                "Что обычно позволяет вам сконцентрироваться?",
                "В каких ситуациях вы расстраиваетесь?"
            ]
        ];

        for ($i = 0; $i < count($questions['uz']); $i++){
            $issue = Question::create([
                'issue_id' => $i + 1,
                'category_id' => $i + 1
            ]);
            foreach ($langs as $lang) {
                QuestionTranslation::create([
                    'name' => $questions[$lang->code][$i],
                    'object_id' => $issue->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
