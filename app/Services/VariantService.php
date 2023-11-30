<?php

namespace App\Services;

use App\Models\Variant;
use App\Services\BaseService;
use App\Http\Resources\VariantResource;

class VariantService extends BaseService
{
    public function __construct(Variant $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = VariantResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }
}
