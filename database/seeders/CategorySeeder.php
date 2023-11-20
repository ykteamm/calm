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
        $menus = ["Home", "Music", "Calm", "Sleep", "Rest"];
        $categories = ["Featured", "Sport", "Mental", "Physical", "Sleeping", "Exercising"];
        foreach ($categories as $cat){
            $category = Category::create([]);
            foreach ($langs as $lang) {
                CategoryTranslation::create([
                    'name' => $cat .'-'. strtoupper($lang->code),
                    'object_id' => $category->id,
                    'language_code' => $lang->code
                ]);
            }
        }
        $categories = Category::all();
        foreach ($menus as $menu){
            $menu_cat = Menu::create([]);
            foreach ($langs as $lang) {
                MenuTranslation::create([
                    'name' => $menu .'-'. strtoupper($lang->code),
                    'object_id' => $menu_cat->id,
                    'language_code' => $lang->code
                ]);
            }
            foreach ($categories as $c) {
                $menu_cat->categories()->attach($c->id);
            }
        }
    }
}
