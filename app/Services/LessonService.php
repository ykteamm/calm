<?php

namespace App\Services;

use App\Models\Lesson;
use App\Services\BaseService;
use App\Http\Resources\LessonResource;
use App\Traits\MakeAsset;

class LessonService extends BaseService
{
    use MakeAsset;
    protected UsershowService $usershowService;
    public function __construct(
        Lesson $serviceModel,
        UsershowService $usershowService
        )
    {
        $this->usershowService = $usershowService;
        $this->model = $serviceModel;
        $this->resource = LessonResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'meditation_id'
        ];
        parent::__construct();
    }

    public function markAsViewedLesson($lesson, $redirective = false)
    {
        if($lesson = $this->findById($lesson)) {
            if (!$this->usershowService->userViewExistsByLesson($lesson->id)) {
                $this->usershowService->create([
                    'user_id' => auth()->id(),
                    'meditation_id' => $lesson->meditation_id,
                    'lesson_id' => $lesson->id
                ]);
            }
            $meditation = $lesson->meditation;
            $meditation->views = $meditation->views + 1;
            $meditation->save();
            return $this->makeResponse(1, $lesson, null, 200, $redirective); 
        } else {
            return $this->makeResponse(0, null, 'Meditation not found', 404, $redirective);
        }
    }
}
