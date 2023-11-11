<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpsertRequest;

class CategoryController extends Controller
{
    protected CategoryService $service;
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $indexRequest)
    {
        $this->service->relations = [];
        $this->service->willParseToRelation = [
            'childs' => ['id', 'parent_id', 'translation' => ['object_id', 'name']],
            'parent' => ['id', 'translation' => ['object_id', 'name']]
        ];

        $data = $this->service->getList($indexRequest);
        
        return $data;
    }

    public function store(CategoryUpsertRequest $upsertRequest)
    {
        $data = $this->service->create($upsertRequest->validated());
        return $data;
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'childs' => ['id', 'parent_id', 'translation' => ['object_id', 'name']],
            'parent' => ['id', 'translation' => ['object_id', 'name']]
        ];
        $data = $this->service->show($id);
        return $data;
    }

    public function update($id, CategoryUpsertRequest $upsertRequest)
    {
        $data = $this->service->edit($id, $upsertRequest->validated());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return $data;
    }
}
