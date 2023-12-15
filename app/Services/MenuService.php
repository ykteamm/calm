<?php

namespace App\Services;

use App\Models\Menu;
use App\Services\BaseService;
use App\Http\Resources\MenuResource;
use App\Traits\MakeAsset;

class MenuService extends BaseService
{
    use MakeAsset;
    public function __construct(Menu $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = MenuResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];

        parent::__construct();
    }

    // public function cat($name)
    // {
    //     return $this->setQuery()
    // }

    public function getCategories($slug)
    {
        $this->setQuery();
        if($menu = $this->query->where('slug', $slug)->first()) {
            return $menu->categories()->pluck('id')->toArray();
        } else {
            return [];
        }

    }
}
