<?php

namespace App\Services;

use App\Models\Rule;
use App\Services\BaseService;
use App\Http\Resources\RuleResource;

class RuleService extends BaseService
{
    protected PackageService $packageService;
    public function __construct(
        Rule $serviceModel,
        PackageService $packageService
        )
    {
        $this->packageService = $packageService;
        $this->model = $serviceModel;
        $this->resource = RuleResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
            'package_id',
            'result_id',
            'min',
            'max',
        ];

        parent::__construct();
    }

    public function checkPackage($package, $percent)
    {
        $this->setQuery();
        $rule = $this->query
            ->where('package_id', $package->id)
            ->where('min', '<', $percent)
            ->where('max', '>', $percent)
            ->first();
        if ($rule) {
            if ($result = $this->packageService->getOne($rule->result_id)) {
                return $result;
            }
        }
        return $package;
    }
}
