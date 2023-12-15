<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Models\Menu;
use App\Models\MenuTranslation;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $menus = [
            'uz' => ["Asosiy", "Musiqa", "Sokinlik", "Uyqu", "Hordiq"],
            'en' => ["Home", "Music", "Calm", "Sleep", "Rest"],
            'ru' => ["Дом", "Музыка", "Спокойствие", "Сон", "Отдых"],
        ];
        $categories = Category::all();
        $enmenus = $menus['en'];
        for ($i = 0; $i < count($enmenus); $i++){
            $menu = Menu::create([
                'slug' => strtolower($enmenus[$i])
            ]);
            foreach ($langs as $lang) {
                MenuTranslation::create([
                    'name' => $menus[$lang->code][$i],
                    'object_id' => $menu->id,
                    'language_code' => $lang->code
                ]);
            }
            foreach ($categories as $c) {
                $menu->categories()->attach($c->id);
            }
        }
    }
}
