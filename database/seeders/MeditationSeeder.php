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
                'name' => "Boshlang'ich Meditatsiya course",
                'type' => MeditationTypeEnum::COURSE,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 1,
                'meditator_id' => 1
            ],
            [
                'name' => "Tirishqoqlik va Iroda Sirlari course",
                'type' => MeditationTypeEnum::COURSE,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 2,
                'meditator_id' => 1
            ],
            [
                'name' => "Minnatdorchilik va Miraj course",
                'type' => MeditationTypeEnum::COURSE,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 3,
                'meditator_id' => 1
            ],
            [
                'name' => "Ishchanlik course",
                'type' => MeditationTypeEnum::COURSE,
                'group' => MeditationGroupEnum::MULTIPLE,
                'category_id' => 4,
                'meditator_id' => 1
            ],
            [
                'name' => "Boshlang'ich Meditatsiya MASTERCLASS",
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::SINGLE,
                'category_id' => 1,
                'meditator_id' => 1
            ],
            [
                'name' => "Tirishqoqlik va Iroda Sirlari MASTERCLASS",
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::SINGLE,
                'category_id' => 2,
                'meditator_id' => 1
            ],
            [
                'name' => "Minnatdorchilik va Miraj MASTERCLASS",
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::SINGLE,
                'category_id' => 3,
                'meditator_id' => 1
            ],
            [
                'name' => "Ishchanlik MASTERCLASS",
                'type' => MeditationTypeEnum::MASTERCLASS,
                'group' => MeditationGroupEnum::SINGLE,
                'category_id' => 4,
                'meditator_id' => 1
            ]
        ];
        foreach ($meditations as $meditation) {
            $meditationObj = Meditation::create([
                'meditator_id' => $meditation['meditator_id'],
                'category_id' => $meditation['category_id'],
                'type' => $meditation['type'],
                'group' => $meditation['group']
            ]);

            $meditationObj->usershows()->create(['user_id' => User::first()->id]);
            $langs = Language::all();

            foreach ($langs as $lang) {
                MeditationTranslation::create([
                    'name' => $meditation['name'],
                    'object_id' => $meditationObj->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
