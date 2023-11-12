<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
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
        $menus = ["Home", "Music", "Calm", "Sleep", "Rest"];
        $categories = ["Featured", "Sport", "Mental", "Physical", "Sleeping", "Exercising"];
        foreach ($categories as $cat){
            $category = Category::create([]);
            CategoryTranslation::create([
                'name' => $cat,
                'object_id' => $category->id,
                'language_code' => 'en'
            ]);
        }
        $categories = Category::all();
        foreach ($menus as $menu){
            $menu_cat = Menu::create([]);
            MenuTranslation::create([
                'name' => $menu,
                'object_id' => $menu_cat->id,
                'language_code' => 'en'
            ]);
            foreach ($categories as $c) {
                $menu_cat->categories()->attach($c->id);
            }
        }
    }
}
