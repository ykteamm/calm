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
            'uz' => ["Meditatsiya", "Dori", "Iroda"],
            'en' => ["Meditatsiyalar", "Medicine", "Will"],
            'ru' => ["Медитации", "Лекарство", "Воля"]
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
