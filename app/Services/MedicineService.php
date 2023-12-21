<?php

namespace App\Services;

use App\Models\Medicine;
use App\Services\BaseService;
use App\Http\Resources\MedicineResource;

class MedicineService extends BaseService
{
    public function __construct(Medicine $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = MedicineResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }
}
