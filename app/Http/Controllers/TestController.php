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

        $this->menu_service->willParseToRelation = [
            'translation',
            'categories' => [
                'translation' => [],
                'meditations' => ['meditator' => ['image'=>[],'avatar' => []],'translation' => []]
                ]
        ];


        $data = $this->menu_service->getList($indexRequest->validated());

        
        // return $data[0]->categories;



        return view("user.index",[
            'categories' => $data,
            'categories_sub' => $data[0]->categories
        ]);

    }
}
