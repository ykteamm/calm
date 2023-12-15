<?php

namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;
use App\Http\Resources\CategoryResource;

class CategoryService extends BaseService
{
    protected QuestionService $questionService;
    protected MenuService $menuService;
    public function __construct(
        Category $serviceModel,
        QuestionService $questionService,
        MenuService $menuService
        )
    {
        $this->questionService = $questionService;
        $this->menuService = $menuService;
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

    public function getByMenuSlug($slug)
    {
        $this->queryClosure = function($q) use ($slug) {
            $q->whereHas('menus', function($q) use ($slug) {
                $q->where('slug', $slug);
            });
        };
        $categories = $this
            ->withRelation([
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ])
            ->getList([]);
        return $categories;
    }

    public function getForMenu($slug)
    {
        $categories = $this->questionService->userCategories();
        $this->setQuery();
        $data = $this->query
            ->whereIn('id', $categories)
            ->with(parseToRelation([
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]))
            ->get();
        return $data;
    }

    public function getForUser()
    {
        $categories = $this->questionService->userCategories();
        $this->setQuery();
        $data = $this->query
            ->whereIn('id', $categories)
            ->with(parseToRelation([
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]))
            ->get();
        return $data;
    }
}
