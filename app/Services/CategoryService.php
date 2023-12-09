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
}
