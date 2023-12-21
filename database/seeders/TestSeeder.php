<?php

namespace Database\Seeders;
use App\Models\Language;
use App\Models\Test;
use App\Models\TestTranslation;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $tests = [
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

        for ($i = 0; $i < count($tests['uz']); $i++){
            $issue = Test::create([]);
            foreach ($langs as $lang) {
                TestTranslation::create([
                    'name' => $tests[$lang->code][$i],
                    'object_id' => $issue->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
