<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageTranslation;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run()
    {
        $this->eatingIssues();
        $this->waterBalance();
        $this->activityBoost();
        $this->vitaminDeficiency();
        $this->calorieControl();
    }

    protected function eatingIssues()
    {
        $packageId = $this->getPackageId('Eating Issues');
        if ($packageId) {
            Rule::create([
                'package_id' => $packageId,
                'result_id' => $packageId,
                'min' => 0,
                'max' => 50,
            ]);
            Rule::create([
                'package_id' => $packageId,
                'result_id' => null,
                'min' => 51,
                'max' => 10000,
            ]);
        }
    }

    protected function waterBalance()
    {
        $packageId = $this->getPackageId('Water Balance');
        if ($packageId) {
            Rule::create([
                'package_id' => $packageId,
                'result_id' => $packageId,
                'min' => 0,
                'max' => 50,
            ]);
            Rule::create([
                'package_id' => $packageId,
                'result_id' => null,
                'min' => 51,
                'max' => 10000,
            ]);
        }
    }

    protected function activityBoost()
    {
        $packageId = $this->getPackageId('Activity Boost');
        if ($packageId) {
            Rule::create([
                'package_id' => $packageId,
                'result_id' => $packageId,
                'min' => 0,
                'max' => 50,
            ]);
            Rule::create([
                'package_id' => $packageId,
                'result_id' => null,
                'min' => 51,
                'max' => 10000,
            ]);
        }
    }

    protected function vitaminDeficiency()
    {
        $packageId = $this->getPackageId('Vitamin Deficiency');
        if ($packageId) {
            Rule::create([
                'package_id' => $packageId,
                'result_id' => $packageId,
                'min' => 0,
                'max' => 50,
            ]);
            Rule::create([
                'package_id' => $packageId,
                'result_id' => null,
                'min' => 51,
                'max' => 10000,
            ]);
        }
    }

    protected function calorieControl()
    {
        $packageId = $this->getPackageId('Calorie Control');
        if ($packageId) {
            Rule::create([
                'package_id' => $packageId,
                'result_id' => $packageId,
                'min' => 0,
                'max' => 50,
            ]);
            Rule::create([
                'package_id' => $packageId,
                'result_id' => null,
                'min' => 51,
                'max' => 10000,
            ]);
        }
    }

    protected function getPackageId($name)
    {
        $packageTranslation = PackageTranslation::where('name', $name)
            ->where('language_code', 'en')
            ->first();

        return $packageTranslation ? $packageTranslation->object_id : null;
    }
}
