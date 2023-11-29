<?php

namespace Database\Seeders;

use App\Models\Gratitude;
use App\Models\GratitudeTranslation;
use App\Models\Language;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class GratitudeSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $gratitude = Gratitude::create([]); 
        foreach ($langs as $lang) {
            GratitudeTranslation::create([
                'name' => "Bugun nimalar qila olding ?",
                'object_id' => $gratitude->id,
                'language_code' => $lang->code
            ]);
        }
        Reply::create([
            'user_id' => auth()->id() ?? 1,
            'gratitude_id' => $gratitude->id,
            'text' => "Hmmasi yaxshi bo'ldi"
        ]);
        Reply::create([
            'user_id' => auth()->id() ?? 1,
            'gratitude_id' => $gratitude->id,
            'text' => "Juda charchadim"
        ]);
        Reply::create([
            'user_id' => auth()->id() ?? 1,
            'gratitude_id' => $gratitude->id,
            'text' => "Samarali kun"
        ]);
    }
}
