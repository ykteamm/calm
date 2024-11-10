<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\AnswerTranslation;
use App\Models\Language;
use App\Models\Test;
use App\Models\TestTranslation;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $tests = [
            'uz' => [
                "Sizning asosiy maqsadingiz nima? (Vazn yo'qotish, vazn olish, sog'lom saqlash)",
                "Kun davomida qancha ovqat iste'mol qilasiz?",
                "Ovqatlanishingizda sabzavot va mevalar ulushi qanchalik yuqori?",
                "Kun davomida suv ichish odatingiz qanday?",
                "Jismoniy faoliyatingiz darajasi qanday? (Masalan: kundalik mashg'ulotlar, yurish, sport)",
                "Oshqozoningiz bilan bog'liq muammolar bormi?",
                "Ovqatlanish vaqtlaringiz muntazammi yoki o'zgarmaydimi?",
                "Kaloriyalarni hisoblaydigan odatlaringiz bormi?"
            ],
            'en' => [
                "What is your primary goal? (Weight loss, weight gain, maintenance)",
                "How many meals do you consume daily?",
                "What is the proportion of vegetables and fruits in your meals?",
                "What is your daily water intake habit?",
                "How would you describe your physical activity level? (e.g., daily exercises, walking, sports)",
                "Do you experience any stomach-related issues?",
                "Are your meal times consistent or irregular?",
                "Do you usually count your calorie intake?"
            ],
            'ru' => [
                "Какая у вас основная цель? (Похудение, набор веса, поддержание формы)",
                "Сколько раз в день вы едите?",
                "Какова доля овощей и фруктов в вашем рационе?",
                "Какова ваша привычка пить воду ежедневно?",
                "Как вы оцениваете уровень своей физической активности? (например, ежедневные упражнения, прогулки, спорт)",
                "Есть ли у вас проблемы с желудком?",
                "Ваши приемы пищи регулярны или нерегулярны?",
                "Вы обычно считаете количество потребляемых калорий?"
            ]
        ];

        $answers = [
            'uz' => [
                [
                    "Vazn yo'qotish",
                    "Vazn olish",
                    "Sog'lom saqlash"
                ],
                [
                    "1-2 marta",
                    "3 yoki undan ko'p marta",
                    "Juda kam"
                ],
                [
                    "Yuqori",
                    "O'rtacha",
                    "Kam"
                ],
                [
                    "Ko'p ichaman",
                    "O'rtacha ichaman",
                    "Kam ichaman"
                ],
                [
                    "Faol",
                    "O'rtacha",
                    "Passiv"
                ],
                [
                    "Ha",
                    "Yo'q"
                ],
                [
                    "Muntazam",
                    "O'zgarmaydi"
                ],
                [
                    "Ha, hisoblayman",
                    "Yo'q, hisoblamayman"
                ]
            ],
            'en' => [
                [
                    "Weight loss",
                    "Weight gain",
                    "Maintenance"
                ],
                [
                    "1-2 times",
                    "3 or more times",
                    "Very rarely"
                ],
                [
                    "High",
                    "Moderate",
                    "Low"
                ],
                [
                    "I drink a lot",
                    "I drink moderately",
                    "I drink very little"
                ],
                [
                    "Active",
                    "Moderate",
                    "Passive"
                ],
                [
                    "Yes",
                    "No"
                ],
                [
                    "Consistent",
                    "Irregular"
                ],
                [
                    "Yes, I count",
                    "No, I don't count"
                ]
            ],
            'ru' => [
                [
                    "Похудение",
                    "Набор веса",
                    "Поддержание формы"
                ],
                [
                    "1-2 раза",
                    "3 или более раз",
                    "Очень редко"
                ],
                [
                    "Высокий",
                    "Средний",
                    "Низкий"
                ],
                [
                    "Пью много",
                    "Пью умеренно",
                    "Пью мало"
                ],
                [
                    "Активный",
                    "Умеренный",
                    "Пассивный"
                ],
                [
                    "Да",
                    "Нет"
                ],
                [
                    "Регулярно",
                    "Нерегулярно"
                ],
                [
                    "Да, считаю",
                    "Нет, не считаю"
                ]
            ]
        ];

        foreach ($tests['uz'] as $index => $question_uz) {
            // Testni yaratish
            $test = Test::create([]);

            // Test tarjimalarini kiritish
            foreach ($langs as $lang) {
                TestTranslation::create([
                    'name' => $tests[$lang->code][$index],
                    'object_id' => $test->id,
                    'language_code' => $lang->code
                ]);
            }

            // Javoblarni yaratish
            foreach ($answers['uz'][$index] as $answer_index => $answer_uz) {
                $answer = Answer::create([
                    'test_id' => $test->id,
                    'order' => $answer_index + 1
                ]);

                // Javob tarjimalarini kiritish
                foreach ($langs as $lang) {
                    AnswerTranslation::create([
                        'name' => $answers[$lang->code][$index][$answer_index],
                        'object_id' => $answer->id,
                        'language_code' => $lang->code
                    ]);
                }
            }
        }
    }
}
