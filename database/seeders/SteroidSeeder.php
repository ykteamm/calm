<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Steroid;
use App\Models\Steroidinfo;
use App\Models\SteroidinfoTranslation;
use App\Models\Steroidtest;
use App\Models\SteroidTranslation;
use Illuminate\Database\Seeder;

class SteroidSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $steroids = [
            'uz' => ["Ovqatlanish muammolari", "Suv balansi", "Faollik yetishmasligi", "Vitaminlar yetishmasligi", "Kaloriya nazorati yo'q"],
            'en' => ["Eating Issues", "Water Balance", "Lack of Activity", "Vitamin Deficiency", "No Calorie Control"],
            'ru' => ["Проблемы с питанием", "Водный баланс", "Недостаток активности", "Недостаток витаминов", "Нет контроля калорий"],
        ];

        $averageScores = [35, 55, 45, 30, 25]; // Har bir steroid uchun o'rtacha ball

        for ($i = 0; $i < count($steroids['uz']); $i++) {
            // Steroid yaratish
            $steroid = Steroid::create([
                'avg' => $averageScores[$i]
            ]);

            // Steroid uchun testlar bog'lash
            $tests = $this->tests()[$i];
            foreach ($tests as $test) {
                Steroidtest::create([
                    'steroid_id' => $steroid->id,
                    'test_id' => $test['id'],
                    'percent' => $test['percent']
                ]);
            }

            // Har bir til uchun tarjimalar kiritish
            foreach ($langs as $lang) {
                SteroidTranslation::create([
                    'name' => $steroids[$lang->code][$i],
                    'object_id' => $steroid->id,
                    'language_code' => $lang->code
                ]);
            }

            // Steroidning informatsiya bloklarini yaratish
            $this->createSteroidInfo($steroid, $langs, $i);
        }
    }

    private function createSteroidInfo($steroid, $langs, $index)
    {
        $infoNames = $this->infoNames(); // Har bir steroid uchun informatsiyalar
        $ranges = $this->infos(); // Min va max qiymatlar

        foreach ($ranges as $key => $range) {
            // Steroid informatsiya yozish
            $steroidInfo = Steroidinfo::create([
                'steroid_id' => $steroid->id,
                'min' => $range['min'],
                'max' => $range['max']
            ]);

            // Har bir til uchun tarjimalar kiritish
            foreach ($langs as $lang) {
                SteroidinfoTranslation::create([
                    'name' => $infoNames[$lang->code][$index][$key],
                    'object_id' => $steroidInfo->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }

    private function infos()
    {
        return [
            ['min' => 0, 'max' => 19],
            ['min' => 20, 'max' => 39],
            ['min' => 40, 'max' => 59],
            ['min' => 60, 'max' => 79],
            ['min' => 80, 'max' => 10000],
        ];
    }

    private function infoNames()
    {
        return [
            'uz' => [
                [
                    "Sizning ovqatlanish odatlaringiz yomon.",
                    "Ovqatlanishingizni yaxshilash kerak.",
                    "O'rtacha ovqatlanish odatlari.",
                    "Yaxshi ovqatlanish odatlari.",
                    "Ajoyib ovqatlanish!"
                ],
                [
                    "Suv ichishingiz juda kam.",
                    "Suv ichishni ko'paytirish kerak.",
                    "O'rtacha suv iste'moli.",
                    "Yaxshi suv ichish odati.",
                    "Mukammal suv iste'moli!"
                ],
                [
                    "Jismoniy faollik yetishmaydi.",
                    "Faollikni oshirish kerak.",
                    "O'rtacha faollik darajasi.",
                    "Yaxshi faollik darajasi.",
                    "Mukammal jismoniy faollik!"
                ],
                [
                    "Vitaminlar yetishmovchiligi aniqlandi.",
                    "Vitaminlarni ko'proq iste'mol qilish lozim.",
                    "Vitaminlar miqdori o'rtacha.",
                    "Yaxshi vitamin darajasi.",
                    "Mukammal vitamin balans!"
                ],
                [
                    "Kaloriya nazorati yo'q.",
                    "Kaloriyani nazorat qilishni boshlang.",
                    "O'rtacha kaloriya nazorati.",
                    "Yaxshi kaloriya nazorati.",
                    "Mukammal kaloriya nazorati!"
                ]
            ],
            'en' => [
                [
                    "Your eating habits are poor.",
                    "You need to improve your eating habits.",
                    "Moderate eating habits.",
                    "Good eating habits.",
                    "Excellent eating habits!"
                ],
                [
                    "You drink very little water.",
                    "You should increase your water intake.",
                    "Moderate water intake.",
                    "Good water intake habits.",
                    "Excellent water consumption!"
                ],
                [
                    "You lack physical activity.",
                    "You need to be more active.",
                    "Moderate physical activity.",
                    "Good activity level.",
                    "Excellent physical activity!"
                ],
                [
                    "Vitamin deficiency detected.",
                    "You need to consume more vitamins.",
                    "Moderate vitamin levels.",
                    "Good vitamin balance.",
                    "Excellent vitamin balance!"
                ],
                [
                    "No calorie control.",
                    "Start tracking your calories.",
                    "Moderate calorie control.",
                    "Good calorie tracking.",
                    "Excellent calorie control!"
                ]
            ],
            'ru' => [
                [
                    "Ваши привычки питания плохие.",
                    "Нужно улучшить свои привычки питания.",
                    "Средние привычки питания.",
                    "Хорошие привычки питания.",
                    "Отличные привычки питания!"
                ],
                [
                    "Вы пьете очень мало воды.",
                    "Следует увеличить потребление воды.",
                    "Среднее потребление воды.",
                    "Хорошие привычки питья воды.",
                    "Отличное потребление воды!"
                ],
                [
                    "Не хватает физической активности.",
                    "Вам нужно быть более активным.",
                    "Средний уровень активности.",
                    "Хороший уровень активности.",
                    "Отличная физическая активность!"
                ],
                [
                    "Обнаружен дефицит витаминов.",
                    "Вам нужно потреблять больше витаминов.",
                    "Средний уровень витаминов.",
                    "Хороший баланс витаминов.",
                    "Отличный баланс витаминов!"
                ],
                [
                    "Нет контроля калорий.",
                    "Начните отслеживать свои калории.",
                    "Средний контроль калорий.",
                    "Хорошее отслеживание калорий.",
                    "Отличный контроль калорий!"
                ]
            ]
        ];
    }

    private function tests()
    {
        return [
            0 => [
                ['id' => 1, 'percent' => 60],
                ['id' => 3, 'percent' => 40],
            ],
            1 => [
                ['id' => 4, 'percent' => 70],
                ['id' => 6, 'percent' => 30],
            ],
            2 => [
                ['id' => 5, 'percent' => 50],
                ['id' => 7, 'percent' => 50],
            ],
            3 => [
                ['id' => 8, 'percent' => 60],
                ['id' => 9, 'percent' => 40],
            ],
            4 => [
                ['id' => 10, 'percent' => 50],
                ['id' => 11, 'percent' => 50],
            ]
        ];
    }
}
