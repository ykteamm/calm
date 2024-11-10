<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Medicine;
use App\Models\Package;
use App\Models\Packagetest;
use App\Models\PackageTranslation;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $medicines = Medicine::all()->pluck('id', 'name')->toArray();

        $packages = [
            'uz' => ["Ovqatlanish muammolari", "Suv balansi", "Faoliyatni oshirish", "Vitamin yetishmovchiligi", "Kaloriya nazorati"],
            'en' => ["Eating Issues", "Water Balance", "Activity Boost", "Vitamin Deficiency", "Calorie Control"],
            'ru' => ["Проблемы с питанием", "Водный баланс", "Увеличение активности", "Дефицит витаминов", "Контроль калорий"],
        ];

        $packageMedicines = [
            "Eating Issues" => ["Fiber Supplement", "Probiotics", "Whole Grains"],
            "Water Balance" => ["Electrolytes", "Coconut Water", "Hydration Capsules"],
            "Activity Boost" => ["Energy Boosters", "Green Tea Extract", "Protein Bars"],
            "Vitamin Deficiency" => ["Multivitamins", "Vitamin D", "Omega-3"],
            "Calorie Control" => ["Appetite Suppressant", "Low-Calorie Snacks", "Meal Replacement Shakes"],
        ];

        foreach ($packages['en'] as $index => $packageName) {
            $package = Package::create([
                'priority' => $index + 1,
                'extra' => json_encode([]),
            ]);

            $package->image()->create([
                'path' => "packages/" . ($index + 1) . ".png",
                'info' => '[]',
            ]);

            foreach ($langs as $lang) {
                PackageTranslation::create([
                    'name' => $packages[$lang->code][$index],
                    'object_id' => $package->id,
                    'language_code' => $lang->code,
                ]);
            }

            $medicineNames = $packageMedicines[$packageName] ?? [];
            foreach ($medicineNames as $medicineName) {
                if (isset($medicines[$medicineName])) {
                    $package->medicines()->attach($medicines[$medicineName]);
                }
            }

            $tests = $this->tests()[$index] ?? [];
            foreach ($tests as $test) {
                Packagetest::create([
                    'package_id' => $package->id,
                    'test_id' => $test['id'],
                    'percent' => $test['percent'],
                ]);
            }
        }
    }

    private function tests()
    {
        return [
            0 => [['id' => 1, 'percent' => 40], ['id' => 2, 'percent' => 30], ['id' => 3, 'percent' => 30]],
            1 => [['id' => 4, 'percent' => 70], ['id' => 5, 'percent' => 30]],
            2 => [['id' => 6, 'percent' => 50], ['id' => 7, 'percent' => 50]],
            3 => [['id' => 8, 'percent' => 60], ['id' => 9, 'percent' => 40]],
            4 => [['id' => 10, 'percent' => 70], ['id' => 11, 'percent' => 30]],
        ];
    }
}
