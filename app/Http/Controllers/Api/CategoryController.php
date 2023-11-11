<?php

namespace App\Http\Controllers\Api;

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
        return $this->service->getListWithResponse($indexRequest);
    }

    public function store(CategoryUpsertRequest $upsertRequest)
    {
        return $this->service->createWithResponse($upsertRequest->validated())->response();
    }

    public function show($id)
    {
        $this->service->willParseToRelation = [
            'childs' => ['id', 'parent_id', 'translation' => ['object_id', 'name']],
            'parent' => ['id', 'translation' => ['object_id', 'name']]
        ];
        return $this->service->showWithResponse($id);
    }

    public function update($id, CategoryUpsertRequest $upsertRequest)
    {
        return $this->service->editWithResponse($id, $upsertRequest->validated());
    }

    public function destroy($id)
    {
        return $this->service->deleteWithResponse($id);
    }
}
