<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Language;

class LanguageService extends BaseService
{
    public function __construct(Language $serviceModel)
    {
        $this->model = $serviceModel;

        $this->equalableFields = [
            'id'
        ];
        parent::__construct();
    }
}
