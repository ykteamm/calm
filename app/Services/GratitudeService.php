<?php

namespace App\Services;

use App\Models\Gratitude;
use App\Services\BaseService;
use App\Http\Resources\GratitudeResource;

class GratitudeService extends BaseService
{
    public function __construct(Gratitude $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = GratitudeResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];

        $this->translationFields = ['name'];

        parent::__construct();
    }
}
