<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Models\Menu;
use App\Models\MenuTranslation;
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
            'uz' => ["Taniqlangan", "Sport", "Aqliy", "Jismoniy", "Uyqu", "Mashq qilish"],
            'en' => ["Featured", "Sport", "Mental", "Physical", "Sleeping", "Exercising"],
            'ru' => ["Рекомендуемые", "Спорт", "Ментальный", "Физический", "Сон", "Тренировки"]
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
