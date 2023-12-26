<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Steroid;
use App\Models\Steroidinfo;
use App\Models\SteroidinfoTranslation;
use App\Models\Steroidtest;
use App\Models\SteroidTranslation;
use Illuminate\Database\Seeder;

class SteroidSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $steroids = [
            'uz' => ["Uyqu", "Buqoq", "Xudbinlik", "Kayfiyat barqarorligi", "Iroda", "Fikrni jamlash"],
            'en' => ["Sleep", "Adenois", "Selfishness", "Mood stability", "Will", "Concentration"],
            'ru' => ["Сон", "Аденуа", "Эгоизм", "Устойчивость настроения", "Воля", "Концентрация"],
        ];
        
        for ($i = 0; $i < count($steroids['uz']); $i++){
            $steroid = Steroid::create([
                'avg' => 80
            ]); 
            $tests = $this->tests()[$i];
            foreach ($tests as $test) {
                Steroidtest::create([
                    'steroid_id' => $steroid->id,
                    'test_id' => $test['id'],
                    'percent' => $test['percent']
                ]);
            }
            foreach ($langs as $lang) {
                SteroidTranslation::create([
                    'name' => $steroids[$lang->code][$i],
                    'object_id' => $steroid->id,
                    'language_code' => $lang->code
                ]);
            }
            foreach ($this->infos() as $key => $info) {
                $streroidInfo = Steroidinfo::create([
                    'steroid_id' => $steroid->id,
                    'min' => $info['min'],
                    'max' => $info['max']
                ]);
                foreach ($langs as $lang) {
                    SteroidinfoTranslation::create([
                        'name' => $steroids[$lang->code][$i] . " " . $info['min'] ."-". $info['max'],
                        'object_id' => $streroidInfo->id,
                        'language_code' => $lang->code
                    ]);
                }
            }
        }
    }

    private function infos()
    {
        return [
            [
                'min' => 0,
                'max' => 9
            ],
            [
                'min' => 10,
                'max' => 19
            ],
            [
                'min' => 20,
                'max' => 29
            ],
            [
                'min' => 30,
                'max' => 39
            ],
            [
                'min' => 40,
                'max' => 49
            ],
            [
                'min' => 50,
                'max' => 59
            ],
            [
                'min' => 60,
                'max' => 10000
            ]
        ];
    }

    private function infosText()
    {
        return [
            'uz' => [
                "Sizning holatingiz", 
                "Buqoq", 
                "Xudbinlik", 
                "Kayfiyat barqarorligi", 
                "Iroda", 
                "Fikrni jamlash"
            ],
            'en' => [
                "Sleep", "Adenois", "Selfishness", "Mood stability", "Will", "Concentration"],
            'ru' => ["Сон", "Аденуа", "Эгоизм", "Устойчивость настроения", "Воля", "Концентрация"],
        ];
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
                    'percent' => 10
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
                    'percent' => 25
                ],
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 4,
                    'percent' => 20
                ],
                [
                    'id' => 5,
                    'percent' => 10
                ],
                [
                    'id' => 6,
                    'percent' => 15
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
                    'percent' => 16
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
                    'percent' => 15
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
                    'percent' => 35
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
                    'percent' => 5
                ],
                [
                    'id' => 5,
                    'percent' => 20
                ],
            ],
            4 => [
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
                    'id' => 9,
                    'percent' => 35
                ],
                [
                    'id' => 5,
                    'percent' => 20
                ],
            ],
            5 => [
                [
                    'id' => 15,
                    'percent' => 15
                ],
                [
                    'id' => 6,
                    'percent' => 5
                ],
                [
                    'id' => 1,
                    'percent' => 15
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
                    'percent' => 20
                ],
            ]
        ];
    }
}
