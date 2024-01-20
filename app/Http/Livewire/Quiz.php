<?php

namespace App\Http\Livewire;

use App\Services\CalculateQuizService;
use App\Services\TestService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Quiz extends Component
{
    private TestService $testService;
    private CalculateQuizService $calculateService;
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
        $this->calculateService = resolve(CalculateQuizService::class);
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
            $result = $this->calculateService->result($this->answers);
            $this->isCompleted = true;
            auth()->user()->{'tests'}()->create([
                'packages' => json_encode($result['packages']),
                'steroids' => json_encode($result['steroids']),
            ]);
            Session::put('quiz', 'done');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
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
