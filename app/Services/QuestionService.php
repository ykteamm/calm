<?php

namespace App\Services;

use App\Models\Question;
use App\Services\BaseService;
use App\Http\Resources\QuestionResource;

class QuestionService extends BaseService
{
    public function __construct(Question $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = QuestionResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
            'type',
            'issue_id'
        ];

        parent::__construct();
    }
}
