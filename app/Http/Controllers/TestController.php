<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Controllers\CategoryController;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;


class TestController extends Controller
{

    protected CategoryService $service;
    protected MenuService $menu_service;
    public function __construct(CategoryService $service,MenuService $menu_service)
    {
        $this->service = $service;
        $this->menu_service = $menu_service;
    }
    public function index(IndexRequest $indexRequest)
    {
        // $data = $indexRequest->validated();
        // $data['p'] = 0;
        // return view("user.index");



        // $this->service->relations = [];
        $this->menu_service->willParseToRelation = [
            'translation',
            // 'childs' => ['id', 'parent_id', 'translation' => ['object_id', 'name']],
            // 'parent' => ['id', 'translation' => ['object_id', 'name']]
        ];

        $data = $this->menu_service->getList($indexRequest->validated());
        
        // return $data;

        return view("user.index",[
            'categories' => $data
        ]);

    }
}
