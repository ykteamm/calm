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
                "Sizning tanangiz sizning eng bebaho mulkingizdir. Unga g'amxo'rlik qiling.",
                "Eng katta boylik - bu sog'liq",
                "Muvaffaqiyat - bu kun va kun takrorlanadigan kichik harakatlar yig'indisidir.",
                "Motivatsiya sizni boshlashingizga yordam beradi. Odat sizni davom ettiradigan narsadir.",
                "Tanangizga g'amxo'rlik qiling. Bu yashashingiz kerak bo'lgan yagona joy.",
                "Yashash uchun ovqatlaning, ovqatlanish uchun emas.",
                "Siz iste'mol qiladigan ovqat eng xavfsiz va kuchli dori yoki zaharning eng sekin shakli bo'lishi mumkin.",
            ],
            'en' => [
                "Your body is your most priceless possession. Take care of it.",
                "The greatest wealth is health.",
                "Success is the sum of small efforts, repeated day in and day out.",
                "Motivation is what gets you started. Habit is what keeps you going.",
                "Take care of your body. It’s the only place you have to live.",
                "Eat to live, not live to eat.",
                "The food you eat can be either the safest and most powerful form of medicine or the slowest form of poison."
            ],
            'ru' => [
                "Ваше тело — ваш самый ценный актив. Позаботьтесь о нем",
                "Самое большое богатство – это здоровье",
                "Успех — это сумма небольших действий, повторяемых изо дня в день",
                "Мотивация помогает вам начать. Привычка — это то, что помогает вам двигаться вперед",
                "Заботьтесь о своем теле. Это единственное место, где вам придется жить",
                "Ешь, чтобы жить, а не есть",
                "Пища, которую вы едите, может быть самым безопасным и мощным лекарством или самой медленной формой яда"
            ]
        ];

        $authors = [
            "Jack LaLanne",
            "Virgil",
            "Robert Collier",
            "Jim Ryun",
            "Jim Rohn",
            "Socrates",
            "Ann Wigmore"
        ];

        for ($i = 0; $i < count($motivations['uz']); $i++) {
            // Yangi motivatsiya yozuvini yaratish
            $motivation = Motivation::create([
                'status' => 0
            ]);

            // Har bir til uchun tarjimani saqlash
            foreach ($langs as $lang) {
                // Muallifni olish
                $author = $authors[$i];

                MotivationTranslation::create([
                    'author' => $author, // Muallif nomi
                    'text' => $motivations[$lang->code][$i], // Motivatsion matn
                    'object_id' => $motivation->id, // Motivatsiya ID
                    'language_code' => $lang->code // Til kodi
                ]);
            }
        }

    }
}
