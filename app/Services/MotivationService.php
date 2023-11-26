<?php

namespace App\Services;

use App\Models\Motivation;
use App\Services\BaseService;
use App\Http\Resources\MotivationResource;

class MotivationService extends BaseService
{
    public function __construct(Motivation $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = MotivationResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
            'created_by',
            'updated_by',
        ];

        $this->translationFields = [
            'author', 'text'
        ];

        parent::__construct();
    }
}
