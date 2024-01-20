<?php

namespace App\Services;

use App\Models\Medicine;
use App\Models\Steroidinfo;

class CalculateQuizService
{
    protected RuleService $ruleService;
    protected PackageService $packageService;
    protected SteroidService $steroidService;
    protected array $answers;
    public function __construct(
        PackageService $packageService,
        RuleService $ruleService,
        SteroidService $steroidService
        )
    {
        $this->ruleService = $ruleService;
        $this->steroidService = $steroidService;
        $this->packageService = $packageService;
        $this->answers = [];
    }

    public function result($answers) 
    {
        $this->answers = $answers;
        return [
            'packages' => $this->calculatePackage(),
            'steroids' => $this->calculateSteroid(),
        ];
    }

    private function getAnswerValueByTestId($testId)
    {
        foreach ($this->answers as $answer) {
            if($answer['test_id'] == $testId) {
                return $this->orderToValue($answer['order']);
            }
        }
        return 0;
    }

    private function orderToValue($order)
    {
        $data = [
            '1' => 20,
            '2' => 40,
            '3' => 60,
            '4' => 80,
            '5' => 100
        ];
        return getProp($data, $order, 0);
    }


    private function calculateSteroid()
    {
        $steroids = $this->steroidService
            ->with(['tests', 'translation'])
            ->getList([]);
        $steroidsData = [];
        foreach ($steroids as $steroid) {
          $sum = 0;
          $chartSum  = 0;
          $i = 0;
          foreach ($steroid->tests as $test) {
            $i++;
            $value = $this->getAnswerValueByTestId($test->test_id);
            $sum += $value * $test->percent;
            $chartSum += $value;
          }
          $result = round($sum / 100);
          $chart = round($chartSum / $i);
          $info = Steroidinfo::where('steroid_id', $steroid->id)
            ->where('min', '<=', $result)
            ->where('max', '>=', $result)
            ->with('translation')
            ->first();
          $steroid = $steroid->toArray();
          $steroid['info'] = $info->toArray();
          $steroid['result'] = $result;
          $steroid['chart'] = $chart;
          $steroidsData[] = $steroid;
        }
        return $steroidsData;
    }

    private function calculatePackagePercent($package)
    {
        $sum = 0;
        foreach ($package->tests as $test) {
            $value = $this->getAnswerValueByTestId($test->test_id);
            $sum += $value * $test->percent;
        }
        return round($sum / 100);
    }

    private function packageMedicines($package)
    {
        return $package->medicines()->with('translation')->get()->toArray();
    }

    private function calculatePackage()
    {
        $packages = $this->packageService->getAll();
        $total = [];
        $data = [];
        foreach ($packages as $package) {
            if (count($data) < 4) {
                $percent = $this->calculatePackagePercent($package);
                if ($package = $this->ruleService->checkPackage($package, $percent)) {
                    if ($this->checkData($data, $package)) {
                        $package->medicines = $this->packageMedicines($package);
                        unset($package->tests);
                        $package->qty = 1;
                        $package->percent = $this->calculatePackagePercent($package);
                        $data[] = $package->toArray();
                    }
                }
            }
            $total[] = $package->toArray();
        }
        return $this->amount($data, $total);
    }

    private function checkData($data, $package)
    {
        foreach ($data as $p) {
            if ($p['id'] == $package->id) {
                return false;
            }
        }
        return true;
    }

    private function amount($data, $total)
    {
        $result = array_values($data);
        if(count($result) != 0) {
            if(count($data) == 3) {
                $result[0]['qty']++;
            } else if (count($data) == 2) {
                $result[0]['qty']++;
                $result[1]['qty']++;
            } else if (count($data) == 1) {
                try {
                    $package = $data[0];
                    $extra = json_decode(getProp($package, 'extra', '[]'));
                    $extraMedicines = Medicine::whereIn('id', $extra)->with('translation')->get()->toArray();
                    $package['medicines'] = array_merge($package['medicines'], $extraMedicines);
                    $package['qty'] = 4;
                    $result = [$package];
                } catch (\Throwable $th) {
                    dd($th->getMessage());
                }
            } else if (count($data) == 0) {
                try {
                    $package = $total[0];
                    $extra = json_decode(getProp($package, 'extra', '[]'));
                    $extraMedicines = Medicine::whereIn('id', $extra)->with('translation')->get()->toArray();
                    $package['medicines'] = array_merge($package['medicines'], $extraMedicines);
                    $package['qty'] = 3;
                    $result = [$package];
                } catch (\Throwable $th) {
                    dd($th->getMessage());
                }
            }
        }
        return $result;
    }
}
