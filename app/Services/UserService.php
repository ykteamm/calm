<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use App\Http\Resources\UserResource;
use App\Traits\MakeAsset;

class UserService extends BaseService
{
    use MakeAsset;
    public function __construct(User $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = UserResource::class;

        $this->likableFields = [
            'firstname',
            'lastname',
            'username',
            'email',
            'phone'
        ];

        $this->equalableFields = [
            'type'
        ];

        parent::__construct();
    }

    
}
