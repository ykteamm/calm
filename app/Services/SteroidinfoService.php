<?php

namespace App\Services;

use App\Models\Steroidinfo;
use App\Services\BaseService;
use App\Http\Resources\SteroidinfoResource;

class SteroidinfoService extends BaseService
{
    public function __construct(Steroidinfo $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = SteroidinfoResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }
}
