<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Package;
use App\Models\PackageTranslation;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run()
    {
        $this->uyqu();
        $this->endokrin();
        $this->antidepressiya();
    }

    protected function antidepressiya()
    {
        $antidepressiya = $this->getPackageId('Anti-Depressiya');
        $kayfiyat = $this->getPackageId('Kayfiyat');
        Rule::create([
            'package_id' => $antidepressiya,
            'result_id' => $antidepressiya,
            'min' => 0,
            'max' => 50
        ]);
        Rule::create([
            'package_id' => $antidepressiya,
            'result_id' => $kayfiyat,
            'min' => 51,
            'max' => 10000
        ]);
    }

    protected function uyqu()
    {
        $uyquId = $this->getPackageId('Uyqu');
        $yengilUyquId = $this->getPackageId('Yengil Uyqu');
        Rule::create([
            'package_id' => $uyquId,
            'result_id' => $uyquId,
            'min' => 0,
            'max' => 50
        ]);
        Rule::create([
            'package_id' => $uyquId,
            'result_id' => $yengilUyquId,
            'min' => 51,
            'max' => 80
        ]);
        Rule::create([
            'package_id' => $uyquId,
            'result_id' => null,
            'min' => 81,
            'max' => 10000
        ]);
    }

    protected function endokrin()
    {
        $asosiy = $this->getPackageId('Endokrin');
        $yengil = $this->getPackageId('Yengil Endokrin');
        Rule::create([
            'package_id' => $asosiy,
            'result_id' => $asosiy,
            'min' => 0,
            'max' => 50
        ]);
        Rule::create([
            'package_id' => $asosiy,
            'result_id' => $yengil,
            'min' => 51,
            'max' => 80
        ]);
        Rule::create([
            'package_id' => $asosiy,
            'result_id' => null,
            'min' => 81,
            'max' => 10000
        ]);
    }

    protected function getPackageId($name, $id = null)
    {
        $packageTr = PackageTranslation::where('name', $name)->where('language_code', 'uz')->first();
        return getProp($packageTr, 'object_id', $id);
    }
}
