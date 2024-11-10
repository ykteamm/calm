<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $categories = [
            'uz' => ["Tanani Mustahkamlash", "Dieta Rejasi", "Fitness va Dieta"],
            // 'uz' => ["Meditatsiya", "Dori", "Iroda", "Baxtli hayot"],
            'en' => ["Bodybuilding", "Diet Plan", "Fitness and Diet"],
            'ru' => ["Бодибилдинг", "План диеты", "Фитнес и диета", ]
            // 'ru' => ["Медитации", "Лекарство", "Воля", "Счастливая жизнь"]
        ];
        for ($i = 0; $i < count($categories['uz']); $i++){
            $category = Category::create([]);
            foreach ($langs as $lang) {
                CategoryTranslation::create([
                    'name' => $categories[$lang->code][$i],
                    'object_id' => $category->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
