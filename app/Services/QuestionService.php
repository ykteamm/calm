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
            'issue_id',
            'category_id'
        ];

        parent::__construct();
    }

    public function userCategories()
    {
        $this->setQuery();
        $questons = auth()->user()->variants()->pluck('question_id')->toArray();
        $categories = $this->query->whereIn('id', $questons)->pluck('category_id')->toArray();
        return $categories;
    }
}
