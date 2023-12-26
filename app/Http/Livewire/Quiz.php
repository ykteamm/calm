<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
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
            $steroidsDataAvg= $this->calculateSteroidAvg();
            $packagesData = $this->calculatePackage();
            $this->result = [
                'packages' => $packagesData,
                'steroids' => $steroidsData,
                'chart' => $steroidsDataAvg
            ];
            $this->isCompleted = true;
            auth()->user()->{'tests'}()->create([
                'packages' => json_encode($packagesData),
                'steroids' => json_encode($steroidsData),
                'chart' => json_encode($steroidsDataAvg)
            ]);
            Session::put('quiz', 'done');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    private function calculateSteroid()
    {
        $steroids = $this->steroidService->with(['tests'])->getList([]);
        $steroidsData = [];
        foreach ($steroids as $steroid) {
          $sum = 0;
          foreach ($steroid->tests as $test) {
            $value = $this->getAnswerValueByTestId($test->test_id);
            $sum += $value * $test->percent;
          }  
          $result = round($sum / 100);
          $steroidsData["$steroid->id"] = $result;
        }
        return $steroidsData;
    }

    private function calculateSteroidAvg()
    {
        $steroids = $this->steroidService->with(['tests'])->getList([]);
        $steroidsDataAvg = [];
        foreach ($steroids as $steroid) {
          $sum = 0;
          $i = 0;
          foreach ($steroid->tests as $test) {
            $i++;
            $value = $this->getAnswerValueByTestId($test->test_id);
            $sum += $value;
          }  
          $result = round($sum / $i);
          $steroidsDataAvg["$steroid->id"] = $result;
        }
        return $steroidsDataAvg;
    }

    private function calculatePackage()
    {
        $packages = $this->packageService->getAll();
        $packagesData = [];
        $ignores = [];
        $total = [];
        foreach ($packages as $package) {
            $sum = 0;
            if (in_array($package->id, $ignores)) {
                continue;
            }
            foreach ($package->tests as $test) {
                $value = $this->getAnswerValueByTestId($test->test_id);
                $sum += $value * $test->percent;
            }  
            $percent = round($sum / 100);
            if ($percent < 59) {
                $ignores = array_merge($ignores, json_decode($package->ignores));
                $package->percent = $percent;
                $package->medicines = ($package->medicines()->with('translation')->get()->toArray());
                unset($package->tests);
                $packagesData[] = $package->toArray();
            }
            $total[] = $package->toArray();
        }

        $result = array_values($packagesData);
        if(count($packagesData) == 3) {
            $result[] = $packagesData[0];
        } else if (count($packagesData) == 2) {
            $result[] = $packagesData[0];
            $result[] = $packagesData[1];
        } else if (count($packagesData) == 1) {
            try {
                $package = $packagesData[0];
                $extra = json_decode(getProp($package, 'extra', '[]'));
                $extraMedicines = Medicine::where('id', $extra)->with('translation')->get()->toArray();
                $package['medicines'] = array_merge($package['medicines'], $extraMedicines);
                $result = []; 
                for ($i=0; $i < 4; $i++) { 
                    $result[] = $package;
                }
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        } else if (count($packagesData) == 0) {
            try {
                $package = $total[0];
                $extra = json_decode(getProp($package, 'extra', '[]'));
                $extraMedicines = Medicine::where('id', $extra)->with('translation')->get()->toArray();
                $package['medicines'] = array_merge($package['medicines'], $extraMedicines);
                $result = []; 
                for ($i=0; $i < 4; $i++) { 
                    $result[] = $package;
                }
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
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
