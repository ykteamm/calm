<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Usershow;

class UsershowService extends BaseService
{
    public function __construct(Usershow $serviceModel)
    {
        $this->model = $serviceModel;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
            'user_id',
            'meditation_id'
        ];

        parent::__construct();
    }

    public function userViewExists($meditation)
    {
        $this->setQuery();
        return $this->query->where('user_id', auth()->id())->where('meditation_id', $meditation)->exists();
    }

    public function userViewExistsByLesson($lesson)
    {
        $this->setQuery();
        return $this->query->where('user_id', auth()->id())->where('lesson_id', $lesson)->exists();
    }
}
