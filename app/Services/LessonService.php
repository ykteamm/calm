<?php

namespace App\Services;

use App\Models\Lesson;
use App\Services\BaseService;
use App\Http\Resources\LessonResource;
use App\Traits\MakeAsset;

class LessonService extends BaseService
{
    use MakeAsset;
    public function __construct(Lesson $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = LessonResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'meditation_id'
        ];
        parent::__construct();
    }
}
