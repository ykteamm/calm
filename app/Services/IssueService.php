<?php

namespace App\Services;

use App\Models\Issue;
use App\Services\BaseService;
use App\Http\Resources\IssueResource;

class IssueService extends BaseService
{
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
