<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use App\Models\Steroidinfo;
use App\Services\PackageService;
use App\Services\SteroidService;
use App\Services\TestService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Quiz extends Component
{
    private TestService $testService;
    private SteroidService $steroidService;
    private PackageService $packageService;
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $questions;
    /**
     * @var \App\Models\Test
     */
    public $question = null;

    public $hasPrev = false;
    public $hasNext = true;

    public $answer = null;
    public array $answers = [];
    public bool $isCompleted = false;
    public array $result = [];

    public function __construct()
    {
        $this->testService = resolve(TestService::class);
        $this->steroidService = resolve(SteroidService::class);
        $this->packageService = resolve(PackageService::class);
    }

    public function mount()
    {
        $this->testService->willParseToRelation = [
            'translation',
            'answers' => [
                'translation' => []
            ]
        ];
        $this->questions = $this->testService->getList([]);
        if(!empty($this->questions)) {
            $this->question = $this->questions[0];
        }
    }

    public function calculate()
    {
        try {
            $steroidsData= $this->calculateSteroid();

            $packagesData = $this->calculatePackage();

            $this->result = [
                'packages' => $packagesData,
                'steroids' => $steroidsData,
            ];
            $this->isCompleted = true;
            auth()->user()->{'tests'}()->create([
                'packages' => json_encode($packagesData),
                'steroids' => json_encode($steroidsData),
            ]);
            Session::put('quiz', 'done');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    private function calculateSteroid()
    {
        $steroids = $this->steroidService->with([
            'tests', 'translation'
            ])->getList([]);
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

        // dd($steroidsData);

        return $steroidsData;
    }

    // private function calculateSteroidAvg()
    // {
    //     $steroids = $this->steroidService->with(['tests'])->getList([]);
    //     $steroidsDataAvg = [];
    //     foreach ($steroids as $steroid) {
    //       $sum = 0;
    //       $i = 0;
    //       foreach ($steroid->tests as $test) {
    //         $i++;
    //         $value = $this->getAnswerValueByTestId($test->test_id);
    //         $sum += $value;
    //       }
    //       $result = round($sum / $i);
    //       $steroidsDataAvg["$steroid->id"] = $result;
    //     }
    //     return $steroidsDataAvg;
    // }

    private function calculatePackage()
    {

        $packages = $this->packageService->getAll();
        $packagesData = [];
        $ignores = [];
        $total = [];

        $asd = [];
        foreach ($packages as $package) {
                $package->qty = 0;
                $sum = 0;
                if (in_array($package->id, $ignores)) {
                    continue;
                }
                foreach ($package->tests as $test) {
                    $value = $this->getAnswerValueByTestId($test->test_id);
                    $sum += $value * $test->percent;
                }
                $percent = round($sum / 100);
                if($package->id == 1)
                {
                    if ($percent < 50) {
                        $package->qty = 1;
                        $ignores = array_merge($ignores, json_decode($package->ignores));
                        $package->percent = $percent;
                        $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
                        unset($package->tests);
                        $packagesData[] = $package->toArray();
                    }
                    $asd[$package->id] = $percent;

                }elseif($package->id == 2)
                {
                    if ($percent < 50) {
                        $package->qty = 1;
                        $ignores = array_merge($ignores, json_decode($package->ignores));
                        $package->percent = $percent;
                        $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
                        unset($package->tests);
                        $packagesData[] = $package->toArray();
                    }
                    $asd[$package->id] = $percent;

                }
                elseif($package->id == 3)
                {
                    if ($percent < 50) {
                        $package->qty = 1;
                        $ignores = array_merge($ignores, json_decode($package->ignores));
                        $package->percent = $percent;
                        $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
                        unset($package->tests);
                        $packagesData[] = $package->toArray();
                    }
                    $asd[$package->id] = $percent;

                }
                else
                {
                    if($asd[3] > 49)
                    {
                        $package->qty = 1;
                        $ignores = array_merge($ignores, json_decode($package->ignores));
                        $package->percent = $percent;
                        $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
                        unset($package->tests);
                        $packagesData[] = $package->toArray();
                    }
                }


            // if ($percent < 49) {
            //     $package->qty = 1;
            //     $ignores = array_merge($ignores, json_decode($package->ignores));
            //     $package->percent = $percent;
            //     $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
            //     unset($package->tests);
            //     $packagesData[] = $package->toArray();
            // }
            $total[] = $package->toArray();
        }
        // dd($packagesData);

        $result = array_values($packagesData);

        // dd($result);
        if(count($result) != 0)
        {
            if(count($packagesData) == 3) {
                $result[0]['qty']++;
            } else if (count($packagesData) == 2) {
                $result[0]['qty']++;
                $result[1]['qty']++;
            } else if (count($packagesData) == 1) {

                try {
                    $package = $packagesData[0];
                    $extra = json_decode(getProp($package, 'extra', '[]'));
                    $extraMedicines = Medicine::whereIn('id', $extra)->with('translation')->get()->toArray();
                    $package['medicines'] = array_merge($package['medicines'], $extraMedicines);
                    $package['qty'] = 4;
                    $result = [$package];
                } catch (\Throwable $th) {
                    dd($th->getMessage());
                }
            } else if (count($packagesData) == 0) {
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
        }else{

        }


        return $result;
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

    public function previous()
    {
        $index = $this->questions->search($this->question);
        if (!$this->hasNext) {
            $this->answer = $this->answers[$index];
            $this->hasNext = true;
            return;
        }
        if (isset($this->questions[$index - 1])) {
            $this->question = $this->questions[$index - 1];
            if (isset($this->answers[$index - 1])) {
                $this->answer = $this->answers[$index - 1];
            }
            $this->hasNext = true;
            if (isset($this->questions[$index - 2])) {
                $this->hasPrev = true;
            } else {
                $this->hasPrev = false;
            }
        }
    }

    public function select($answer)
    {
        $index = $this->questions->search($this->question);
        $this->answers[$index] = $answer;
        if (isset($this->questions[$index + 1])) {
            $this->question = $this->questions[$index + 1];
            $this->hasPrev = true;
        } else {
            $this->hasNext = false;
        }
    }

    public function render()
    {
        return view('livewire.quiz');
    }
}
