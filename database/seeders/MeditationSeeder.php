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
        for ($i=0; $i < 10; $i++) { 
            foreach ($meditators as $meditator) {
                $this->create($meditator);
            }
        }
    }

    protected function create($meditator)
    {
        $names = [
            'uz' => 'Meditatsiya',
            'en' => 'Meditation',
            'ru' => 'Медитация'
        ];
        $meditation = Meditation::create([
            'meditator_id' => $meditator->id,
            'category_id' => Category::inRandomOrder()->first()->id
        ]);
        $meditation->usershows()->create(['user_id' => User::first()->id]);
        $langs = Language::all();
        foreach ($langs as $lang) {
            MeditationTranslation::create([
                'name' => $names[$lang->code] . ' ' . Str::random(10) . ' ' . $lang->code,
                'object_id' => $meditation->id,
                'language_code' => $lang->code
            ]);
        }
    }
}
