<?php

namespace App\Services;

use App\Models\Meditation;
use App\Services\BaseService;
use App\Http\Resources\MeditationResource;

class MeditationService extends BaseService
{
    public function __construct(Meditation $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = MeditationResource::class;

        $this->likableFields = [
            'name',
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }
}
