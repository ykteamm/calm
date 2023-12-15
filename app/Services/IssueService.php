<?php

namespace App\Services;

use App\Models\Issue;
use App\Services\BaseService;
use App\Http\Resources\IssueResource;
use App\Traits\MakeAsset;

class IssueService extends BaseService
{
    use MakeAsset;
    public function __construct(Issue $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = IssueResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];

        parent::__construct();
    }
}
