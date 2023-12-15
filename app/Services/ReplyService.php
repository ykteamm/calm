<?php

namespace App\Services;

use App\Models\Reply;
use App\Services\BaseService;
use App\Http\Resources\ReplyResource;
use Carbon\Carbon;

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
        return $this->query
            ->where('user_id', auth()->id())
            ->with(parseToRelation([
                'gratitude' => ['translation' => []]
            ]))
            ->orderBy('created_at', 'DESC')
            ->first();
    }
    
    public function today()
    {
        $this->setQuery();
        return $this->query
            ->where('user_id', auth()->id())
            ->with(parseToRelation([
                'gratitude' => ['translation' => []]
            ]))
            ->whereDate('created_at', date("Y-m-d"))
            ->orderBy('created_at', 'DESC')
            ->first();
    }
}
