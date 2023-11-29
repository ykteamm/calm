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
        ];

        $this->equalableFields = [
            'id',
            'meditator_id',
            'category_id'
        ];

        parent::__construct();
    }

    public function incViewsValue($meditation, $redirective = false)
    {
        if($meditation = $this->findById($meditation)) {
            $meditation->views = $meditation->views + 1;
            $meditation->save();
            return $this->makeResponse(1, $meditation, null, 200, $redirective); 
        } else {
            return $this->makeResponse(0, null, 'Meditation not found', 404, $redirective);
        }
    }
}
