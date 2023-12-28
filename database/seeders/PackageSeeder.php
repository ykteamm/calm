<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Medicine;
use App\Models\MedicineTranslation;
use App\Models\Package;
use App\Models\Packagetest;
use App\Models\PackageTranslation;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $medicines = Medicine::all()->pluck('id')->toArray();
        $packages = [
            'uz' => ["Uyqu", "Endokrin", "Anti-Depressiya", "Anti-Stress"],
            'en' => ["Sleep", "Adenois", "Heavy stress", "Mild stress"],
            'ru' => ["Сон", "Аденуа", "Сильный стресс", "Легкий стресс"],
        ];

        for ($i = 0; $i < count($packages['uz']); $i++){
            $ignores = [];
            if($i == 2) {
                $ignores[] = 4;
            }
            $extra = [];
            if($i == 1) {
                $extra[] = 1;
            }
            $package = Package::create([
                'priority' => $i + 1,
                'ignores' => json_encode($ignores),
                'extra' => json_encode($extra)
            ]);
            $package->image()->create([
                'path' => "packages/" . ($i+1) . ".png",
                'info' => '[]'
            ]);
            $package->medicines()->attach($medicines);
            $tests = $this->tests()[$i];
            foreach ($tests as $test) {
                Packagetest::create([
                    'package_id' => $package->id,
                    'test_id' => $test['id'],
                    'percent' => $test['percent']
                ]);
            }
            foreach ($langs as $lang) {
                PackageTranslation::create([
                    'name' => $packages[$lang->code][$i],
                    'object_id' => $package->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }

    private function tests()
    {
        return [
            0 => [
                [
                    'id' => 1,
                    'percent' => 10
                ],
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 5,
                    'percent' => 20
                ],
                [
                    'id' => 7,
                    'percent' => 4
                ],
                [
                    'id' => 9,
                    'percent' => 5
                ],
                [
                    'id' => 11,
                    'percent' => 5
                ],
                [
                    'id' => 13,
                    'percent' => 15
                ],
            ],
            1 => [
                [
                    'id' => 1,
                    'percent' => 10
                ],
                [
                    'id' => 2,
                    'percent' => 5
                ],
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 4,
                    'percent' => 5
                ],
                [
                    'id' => 5,
                    'percent' => 10
                ],
                [
                    'id' => 6,
                    'percent' => 11
                ],
                [
                    'id' => 7,
                    'percent' => 15
                ],
            ],
            2 => [
                [
                    'id' => 8,
                    'percent' => 10
                ],
                [
                    'id' => 9,
                    'percent' => 20
                ],
                [
                    'id' => 10,
                    'percent' => 10
                ],
                [
                    'id' => 11,
                    'percent' => 5
                ],
                [
                    'id' => 12,
                    'percent' => 10
                ],
                [
                    'id' => 15,
                    'percent' => 20
                ],
                [
                    'id' => 14,
                    'percent' => 10
                ],
            ],
            3 => [
                [
                    'id' => 15,
                    'percent' => 10
                ],
                [
                    'id' => 6,
                    'percent' => 25
                ],
                [
                    'id' => 1,
                    'percent' => 5
                ],
                [
                    'id' => 12,
                    'percent' => 10
                ],
                [
                    'id' => 1,
                    'percent' => 10
                ],
                [
                    'id' => 12,
                    'percent' => 15
                ],
                [
                    'id' => 5,
                    'percent' => 10
                ],
            ]
        ];
    }
}
