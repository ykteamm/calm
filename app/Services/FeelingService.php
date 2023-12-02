<?php

namespace App\Services;

use App\Models\Feeling;
use App\Services\BaseService;
use App\Http\Resources\FeelingResource;

class FeelingService extends BaseService
{
    public function __construct(Feeling $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = FeelingResource::class;

        $this->likableFields = [
            'story',
        ];

        $this->equalableFields = [
            'id',
            'user_id',
            'emoji_id',
            'status'
        ];

        parent::__construct();
    }
}
