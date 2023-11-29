<?php

namespace App\Services;

use App\Models\Reply;
use App\Services\BaseService;
use App\Http\Resources\ReplyResource;

class ReplyService extends BaseService
{
    public function __construct(Reply $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = ReplyResource::class;

        $this->likableFields = [
            'text',
        ];

        $this->equalableFields = [
            'id',
            'gratitude_id',
            'user_id'
        ];

        parent::__construct();
    }

    public function last()
    {
        $this->setQuery();
        return $this->query->where('user_id', auth()->id())->orderBy('created_at', 'DESC')->first();
    }
}
