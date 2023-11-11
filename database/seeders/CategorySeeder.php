<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
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
        for ($i=1; $i < 21; $i++) { 
            $this->maker([
                'parent_id' => ($i < 11) ? null : ($i - 10),
                'name' => ($i < 11) ? "ID-$i parent of " . ($i + 10 ): "ID-$i child of " . ($i - 10)
            ]);
        }
    }

    protected function maker($data)
    {
        $category = Category::create([
            'parent_id' => $data['parent_id']
        ]);
        foreach (['uz', 'ru', 'en'] as $lang) {
            CategoryTranslation::create([
                'name' => $data['name'],
                'object_id' => $category->id,
                'language_code' => $lang
            ]);
        }
    }
}
