<?php

namespace App\Services;

use App\Models\Answer;
use App\Services\BaseService;
use App\Http\Resources\AnswerResource;

class AnswerService extends BaseService
{
    public function __construct(Answer $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = AnswerResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
            'test_id'
        ];

        parent::__construct();
    }
}
