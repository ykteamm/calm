<?php

namespace App\Services;

use App\Models\Emoji;
use App\Services\BaseService;
use App\Http\Resources\EmojiResource;
use App\Traits\MakeAsset;

class EmojiService extends BaseService
{
    use MakeAsset;
    public function __construct(Emoji $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = EmojiResource::class;

        $this->likableFields = [
            'text',
        ];

        $this->equalableFields = [
            'id'
        ];

        parent::__construct();
    }
}
