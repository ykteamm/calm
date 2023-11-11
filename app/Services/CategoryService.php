<?php

namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;
use App\Http\Resources\CategoryResource;

class CategoryService extends BaseService
{
    public function __construct(Category $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = CategoryResource::class;

        $this->relationLikableFields = [
            'translations' => 'name'
        ];

        $this->equalableFields = [
            'id'
        ];
        parent::__construct();
    }
}
