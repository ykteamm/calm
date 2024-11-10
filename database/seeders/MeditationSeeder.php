<?php

namespace Database\Seeders;

use App\Enums\MeditationGroupEnum;
use App\Enums\MeditationTypeEnum;
use App\Models\Category;
use App\Models\Language;
use App\Models\Meditation;
use App\Models\MeditationTranslation;
use App\Models\Meditator;
use App\Models\User;
use Illuminate\Database\Seeder;

class MeditationSeeder extends Seeder
{
    public function run()
    {
        $meditations = [
            [
                'translations' => [
                    'uz' => "Tanangizni sezishni o‘rganing",
                    'ru' => "Изучите ощущения своего тела",
                    'en' => "Learn to feel your body"
                ],
                'type' => MeditationTypeEnum::COURSE,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 1,
                'meditator_id' => 1
            ],
            [
                'translations' => [
                    'uz' => "To‘g‘ri ovqatlanish",
                    'ru' => "Правильное питание",
                    'en' => "Healthy eating"
                ],
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 2,
                'meditator_id' => 3
            ],
            [
                'translations' => [
                    'uz' => "Orzuingizdagi formaga erishing",
                    'ru' => "Достигните формы своей мечты",
                    'en' => "Achieve your dream shape"
                ],
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 3,
                'meditator_id' => 2
            ],
        ];

        foreach ($meditations as $meditation) {
            // Asosiy meditation ob'ektini yaratish
            $meditationObj = Meditation::create([
                'meditator_id' => $meditation['meditator_id'],
                'category_id' => $meditation['category_id'],
                'type' => $meditation['type'],
                'group' => $meditation['group']
            ]);

            // User bilan bog'lash
            $meditationObj->usershows()->create(['user_id' => User::first()->id]);

            // Har bir til uchun tarjimalarni saqlash
            foreach ($meditation['translations'] as $langCode => $translationName) {
                MeditationTranslation::create([
                    'name' => $translationName,
                    'object_id' => $meditationObj->id,
                    'language_code' => $langCode
                ]);
            }
        }
    }
}
