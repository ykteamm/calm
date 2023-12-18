<?php

namespace App\Services;

use App\Models\Landscape;
use App\Services\BaseService;
use App\Http\Resources\LandscapeResource;
use App\Traits\MakeAsset;

class LandscapeService extends BaseService
{
    use MakeAsset;
    
    public function __construct(Landscape $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = LandscapeResource::class;

        $this->likableFields = [
            'name',
        ];

        $this->equalableFields = [
            'id',
            'created_by',
            'updated_by',
        ];

        parent::__construct();
    }
}
