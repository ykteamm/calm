<?php

namespace App\Services;

use App\Models\Test;
use App\Services\BaseService;
use App\Http\Resources\TestResource;

class TestService extends BaseService
{
    public function __construct(Test $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = TestResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }

    public function getCount()
    {
        $this->setQuery();
        return $this->query->count();
    }
}
