<?php

namespace App\Services;

use App\Models\Menu;
use App\Services\BaseService;
use App\Http\Resources\MenuResource;

class MenuService extends BaseService
{
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
}
