<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Medicine;
use App\Models\MedicineTranslation;
use App\Models\Package;
use App\Models\PackageTranslation;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $medicines = Medicine::all()->pluck('id')->toArray();
        $packages = [
            'uz' => ["Sokinlik", "Uyqu", "Hordiq"],
            'en' => ["Calm", "Sleep", "Rest"],
            'ru' => ["Спокойствие", "Сон", "Отдых"],
        ];
        for ($i = 0; $i < count($packages['uz']); $i++){
            $package = Package::create([]); 
            $package->medicines()->attach($medicines);
            foreach ($langs as $lang) {
                PackageTranslation::create([
                    'name' => $packages[$lang->code][$i],
                    'object_id' => $package->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
