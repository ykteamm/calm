<?php

namespace App\Http\Livewire;

use App\Services\LessonService;
use App\Services\MeditationService;
use Livewire\Component;

class Meditation extends Component
{
    protected MeditationService $meditationService;
    protected LessonService $lessonService;
    public $meditation;
    public $lessons;
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
        $this->meditationService = resolve(MeditationService::class);
        $this->lessonService = resolve(LessonService::class);
    }

    public function played($lesson)
    {
        $this->lessonService->markAsViewedLesson(getProp($lesson, 'id'));
    }

    public function mount()
    {
        $this->meditationService->willParseToRelation = [
            'lessons' => [
                fn ($q) => $q->orderBy('block', 'ASC'),
                'image' => [],
                'audio' => [], 
                'translation' => []
            ],
            'meditator' => [
                'image'=> [],
                'avatar' => []
            ],
        ];
        $meditation = $this->meditationService->show($this->id);
        for ($i = 0; $i < $meditation->lessons->count(); $i++) { 
            $blocked = false;
            if (count($meditation->usershows) > 0 && $meditation->lessons[$i]->block) {
                if (hasLessonBlocked($meditation->usershows, $meditation->lessons[$i])) {
                    $blocked = true;
                }
            } else {
                if ($meditation->lessons[$i]->block) {
                    $blocked = true;
                }
            }
            $meditation->lessons[$i]->{"blocked"} = $blocked;
        }        
        $this->meditation = $meditation;
    }
    public function render()
    {
        return view('livewire.meditation');
    }
}
