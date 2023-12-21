<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Medicine;
use App\Models\MedicineTranslation;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $translations = [
            'uz' => [
                'Yod',
                'Ashvaganda',
                'Buyrak choy',
                'Giyoh'
            ],
            'en' => [
                'Yod - en',
                'Ashvaganda - en',
                'Buyrak choy - en',
                'Giyoh - en'
            ],
            'ru' => [
                'Yod - ru',
                'Ashvaganda - ru',
                'Buyrak choy - ru',
                'Giyoh - ru'
            ]
        ];
        for ($i = 0; $i < count($translations['uz']); $i++){
            $medicine = Medicine::create([]); 
            foreach ($langs as $lang) {
                MedicineTranslation::create([
                    'name' => $translations[$lang->code][$i],
                    'object_id' => $medicine->id,
                    'language_code' => $lang->code
                ]);
            }
        }
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Hmmasi yaxshi bo'ldi"
        // ]);
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Juda charchadim"
        // ]);
        // Reply::create([
        //     'user_id' => auth()->id() ?? 1,
        //     'gratitude_id' => $gratitude->id,
        //     'text' => "Samarali kun"
        // ]);
    }
}
