<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\Meditation;
use App\Models\MeditationTranslation;
use App\Models\Meditator;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MeditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditators = Meditator::all();
        // for ($i=0; $i < 2; $i++) {
            foreach ($meditators as $meditator) {
                if ($meditator->id == 1) {
                    $this->create($meditator);

                } else {
                    $this->create2($meditator);

                }

            }
        // }
    }

    protected function create($meditator)
    {
        $names = [
            'uz' => 'Meditatsiya',
            'en' => 'Meditation',
            'ru' => 'Медитация'
        ];

        $nameser = [
            'Boshlang\'ich Meditaciya'
        ];

            $meditation = Meditation::create([
                'meditator_id' => $meditator->id,
                'category_id' => 1
            ]);
        // $meditation = Meditation::create([
        //     'meditator_id' => $meditator->id,
        //     'category_id' => Category::inRandomOrder()->first()->id
        // ]);
        $meditation->usershows()->create(['user_id' => User::first()->id]);
        $langs = Language::all();

        foreach ($langs as $sd => $lang) {
            MeditationTranslation::create([
                'name' => $nameser[0],
                'object_id' => $meditation->id,
                'language_code' => $lang->code
            ]);
        }
    }
    protected function create2($meditator)
    {
        $names = [
            'uz' => 'Meditatsiya',
            'en' => 'Meditation',
            'ru' => 'Медитация'
        ];

        $nameser = [
            'Tirishqoqlik va Iroda Sirlari'
        ];


            $meditation = Meditation::create([
                'meditator_id' => $meditator->id,
                'category_id' => 3
            ]);

        $meditation->usershows()->create(['user_id' => User::first()->id]);
        $langs = Language::all();

        foreach ($langs as $sd => $lang) {
            MeditationTranslation::create([
                'name' => $nameser[0],
                'object_id' => $meditation->id,
                'language_code' => $lang->code
            ]);
        }
    }
}
