<?php

namespace App\Services;

use App\Models\Gratitude;
use App\Services\BaseService;
use App\Http\Resources\GratitudeResource;

class GratitudeService extends BaseService
{
    protected ReplyService $replyService;
    public function __construct(
        Gratitude $serviceModel,
        ReplyService $replyService
        )
    {
        $this->replyService = $replyService;
        $this->model = $serviceModel;
        $this->resource = GratitudeResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];

        $this->translationFields = ['name'];

        parent::__construct();
    }

    public function lastGratitude()
    {
        if ($last = $this->replyService->last()) {
            $this->willParseToRelation = [
                'replies'
            ];
            $gratitude = $this->show($last->gratitude_id);
            return $gratitude;
        }
    }
}
