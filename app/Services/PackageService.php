<?php

namespace App\Services;

use App\Models\Package;
use App\Services\BaseService;
use App\Http\Resources\PackageResource;

class PackageService extends BaseService
{
    public function __construct(Package $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = PackageResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];

        parent::__construct();
    }
}
