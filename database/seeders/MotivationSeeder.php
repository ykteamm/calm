<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Motivation;
use App\Models\MotivationTranslation;
use Illuminate\Database\Seeder;

class MotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $langs = Language::all();
    for ($i=1; $i < 2; $i++) { 
            $motivation = Motivation::create([
                'status' => 0
            ]);
            foreach ($langs as $lang) {
                MotivationTranslation::create([
                    'author' => "$motivation->id user",
                    'text' => 'Ok',
                    'object_id' => $motivation->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
