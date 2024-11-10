<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Variant;
use App\Models\VariantTranslation;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $variants = [
            // Savol 1 uchun variantlar (Sizning asosiy maqsadingiz nima?)
            'uz' => [
                [
                    'name' => "Vazn yo'qotish",
                    'answer' => "Kaloriyalarni kamaytirish uchun reja tanlang.",
                    'object_id' => 1,
                    'ball' => 5
                ],
                [
                    'name' => "Vazn olish",
                    'answer' => "Protein va uglevodlarga boy ovqatlar iste'mol qiling.",
                    'object_id' => 1,
                    'ball' => 4
                ],
                [
                    'name' => "Sog'lom saqlash",
                    'answer' => "Balanslangan ovqatlanishni davom ettiring.",
                    'object_id' => 1,
                    'ball' => 3
                ],

                // Savol 2 uchun variantlar
                [
                    'name' => "3 yoki undan ko'p marta",
                    'answer' => "Ovqatlanishingiz muntazam va yaxshi.",
                    'object_id' => 2,
                    'ball' => 5
                ],
                [
                    'name' => "1-2 marta",
                    'answer' => "Ovqatlanish odatlaringizni yaxshilashingiz kerak.",
                    'object_id' => 2,
                    'ball' => 3
                ],

                // Savol 3 uchun variantlar
                [
                    'name' => "50% yoki undan ko'p",
                    'answer' => "Ajoyib! Ovqatlanishingiz yaxshi balanslangan.",
                    'object_id' => 3,
                    'ball' => 5
                ],
                [
                    'name' => "25-50%",
                    'answer' => "Sabzavot va mevalar miqdorini ko'paytiring.",
                    'object_id' => 3,
                    'ball' => 4
                ],
                [
                    'name' => "25% yoki kamroq",
                    'answer' => "Dietangizni qayta ko'rib chiqing.",
                    'object_id' => 3,
                    'ball' => 2
                ],

                // Savol 4 uchun variantlar
                [
                    'name' => "Kuniga 2 litr yoki undan ko'p",
                    'answer' => "Sizning odatlaringiz mukammal.",
                    'object_id' => 4,
                    'ball' => 5
                ],
                [
                    'name' => "Kuniga 1-2 litr",
                    'answer' => "Suv iste'molini oshirishga harakat qiling.",
                    'object_id' => 4,
                    'ball' => 3
                ],
                [
                    'name' => "Kuniga 1 litrdan kam",
                    'answer' => "Suv ichishni ko'paytirish zarur.",
                    'object_id' => 4,
                    'ball' => 1
                ]
            ],
            'en' => [
                [
                    'name' => "Weight Loss",
                    'answer' => "Choose a plan that reduces your calorie intake.",
                    'object_id' => 1,
                    'ball' => 5
                ],
                [
                    'name' => "Weight Gain",
                    'answer' => "Consume protein-rich and carbohydrate-rich foods.",
                    'object_id' => 1,
                    'ball' => 4
                ],
                [
                    'name' => "Maintain Health",
                    'answer' => "Continue with balanced nutrition.",
                    'object_id' => 1,
                    'ball' => 3
                ],

                // Question 2
                [
                    'name' => "3 or more times",
                    'answer' => "Your eating habits are regular and good.",
                    'object_id' => 2,
                    'ball' => 5
                ],
                [
                    'name' => "1-2 times",
                    'answer' => "You need to improve your eating habits.",
                    'object_id' => 2,
                    'ball' => 3
                ],

                // Question 3
                [
                    'name' => "50% or more",
                    'answer' => "Excellent! Your meals are well balanced.",
                    'object_id' => 3,
                    'ball' => 5
                ],
                [
                    'name' => "25-50%",
                    'answer' => "Increase your intake of vegetables and fruits.",
                    'object_id' => 3,
                    'ball' => 4
                ],
                [
                    'name' => "25% or less",
                    'answer' => "Review your diet.",
                    'object_id' => 3,
                    'ball' => 2
                ],

                // Question 4
                [
                    'name' => "2 liters or more per day",
                    'answer' => "Your water drinking habits are excellent.",
                    'object_id' => 4,
                    'ball' => 5
                ],
                [
                    'name' => "1-2 liters per day",
                    'answer' => "Try to increase your water intake.",
                    'object_id' => 4,
                    'ball' => 3
                ],
                [
                    'name' => "Less than 1 liter per day",
                    'answer' => "You need to improve your water intake habits.",
                    'object_id' => 4,
                    'ball' => 1
                ]
            ],
            'ru' => [
                [
                    'name' => "Похудение",
                    'answer' => "Выберите план с уменьшением калорий.",
                    'object_id' => 1,
                    'ball' => 5
                ],
                [
                    'name' => "Набор веса",
                    'answer' => "Употребляйте белковые и углеводные продукты.",
                    'object_id' => 1,
                    'ball' => 4
                ],
                [
                    'name' => "Поддержание здоровья",
                    'answer' => "Сбалансированное питание.",
                    'object_id' => 1,
                    'ball' => 3
                ],

                // Вопрос 2
                [
                    'name' => "3 или более раз",
                    'answer' => "Ваши привычки питания регулярны и хороши.",
                    'object_id' => 2,
                    'ball' => 5
                ],
                [
                    'name' => "1-2 раза",
                    'answer' => "Вам нужно улучшить свои привычки питания.",
                    'object_id' => 2,
                    'ball' => 3
                ],

                // Вопрос 3
                [
                    'name' => "50% или больше",
                    'answer' => "Отлично! Ваш рацион сбалансирован.",
                    'object_id' => 3,
                    'ball' => 5
                ],
                [
                    'name' => "25-50%",
                    'answer' => "Увеличьте потребление овощей и фруктов.",
                    'object_id' => 3,
                    'ball' => 4
                ],
                [
                    'name' => "25% или меньше",
                    'answer' => "Пересмотрите свою диету.",
                    'object_id' => 3,
                    'ball' => 2
                ],

                // Вопрос 4
                [
                    'name' => "2 литра или больше в день",
                    'answer' => "Ваши привычки питья воды отличны.",
                    'object_id' => 4,
                    'ball' => 5
                ],
                [
                    'name' => "1-2 литра в день",
                    'answer' => "Попробуйте увеличить потребление воды.",
                    'object_id' => 4,
                    'ball' => 3
                ],
                [
                    'name' => "Меньше 1 литра в день",
                    'answer' => "Вам нужно улучшить свои привычки питья воды.",
                    'object_id' => 4,
                    'ball' => 1
                ]
            ]
        ];

        foreach ($variants['uz'] as $index => $variant_uz) {
            $variant = Variant::create([
                'question_id' => $variant_uz['object_id'],
                'ball' => $variant_uz['ball']
            ]);

            foreach ($langs as $lang) {
                VariantTranslation::create([
                    'name' => $variants[$lang->code][$index]['name'],
                    'object_id' => $variant->id,
                    'answer' => $variants[$lang->code][$index]['answer'],
                    'language_code' => $lang->code,
                    'ball' => $variant_uz['ball']
                ]);
            }
        }
    }
}
