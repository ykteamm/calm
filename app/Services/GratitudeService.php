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

    public function lastRepliedGratitude($reply = null)
    {
        if(!$reply) {
            $reply = $this->replyService->today();
        }
        if ($reply) {
            $this->willParseToRelation = [
                'replies'
            ];
            $gratitude = $this->show($reply->gratitude_id);
            return $gratitude;
        }
    }

    public function todayRepliedGratitude($reply = null)
    {
        if(!$reply) {
            $reply = $this->replyService->today();
        }
        if ($reply) {
            $this->willParseToRelation = [
                'replies'
            ];
            $gratitude = $this->show($reply->gratitude_id);
            return $gratitude;
        }
    }

    public function getRandomly($old = null)
    {
        $this->setQuery();
        if($old) {
            $this->query->where('id', '<>', getProp($old, 'id'));
        }

        return $this->query->with('translation')->inRandomOrder()->first();
        // if ($data) return $data->toArray();
    }
}
