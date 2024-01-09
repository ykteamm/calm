<?php

namespace App\Services;

use App\Enums\MeditationGroupEnum;
use App\Models\Meditation;
use App\Services\BaseService;
use App\Http\Resources\MeditationResource;
use Illuminate\Support\Facades\DB;

class MeditationService extends BaseService
{
    protected UsershowService $usershowService;
    protected CategoryService $categoryService; 
    public function __construct(
        Meditation $serviceModel,
        UsershowService $usershowService,
        CategoryService $categoryService
    ){
        $this->usershowService = $usershowService;
        $this->categoryService = $categoryService;
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

    public function getAllByCatName($name)
    {
        $category = $this->categoryService->getByName($name);
        $this->setQuery();
        return $this->query
            ->where('category_id', getProp($category, 'id'))
            ->with(parseToRelation(['meditator' => [
                'image'=> [],
                'avatar' => [],
            ],
            'category' => ['translation' => []],
            'translation' => []]))
            ->get();
    }

    public function markAsViewed($meditation, $redirective = false)
    {
        if($meditation = $this->findById($meditation)) {
            if (!$this->usershowService->userViewExists($meditation->id)) {
                $this->usershowService->create([
                    'user_id' => auth()->id(),
                    'meditation_id' => $meditation->id
                ]);
            }
            $meditation->views = $meditation->views + 1;
            $meditation->save();
            return $this->makeResponse(1, $meditation, null, 200, $redirective); 
        } else {
            return $this->makeResponse(0, null, 'Meditation not found', 404, $redirective);
        }
    }

    public function recentlyViewed($data = [])
    {
        $this->queryClosure = function ($q) {
            $q->whereHas('usershows', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->with(parseToRelation([
                'meditator' => [
                    'image'=> [],
                    'avatar' => []
                ],
                // 'lessons' => ['audio' => []],
            'translation' => []]))
            ->limit(10);
        };
        return $this->getList($data);
    }

    // public function popularByCategory($data)
    // {
    //     $this->categoryService->willParseToRelation = [
    //         'meditations' => [
    //             fn ($q) => $q->orderBy('views', 'DESC') 
    //         ]
    //     ];
    //     $this->categoryService->queryClosure = fn ($q) => $q->limit(10);
    //     return $this->categoryService->getList($data);
    // }

    public function popular($data = [])
    {
        $this->queryClosure = fn ($q) => $q
        ->orderBy('views', 'DESC')
        ->with(parseToRelation(['meditator' => [
            'image'=> [],
            'avatar' => []
        ],
        'translation' => [],
        'lessons' => [
            'image' => [], 
            'translation' => [], 
            'audio' => []
        ]]))
        ->limit(10);
        return $this->getList($data);
    }

    public function forLesson()
    {
        $this->willParseToRelation = ['translation'];
        $this->queryClosure = function($q) {
            $group = MeditationGroupEnum::SINGLE;
            $q->whereRaw("CASE WHEN meditations.group = $group THEN (SELECT COUNT(*) FROM lessons AS l WHERE l.meditation_id = meditations.id) = 0 ELSE 1=1 END");
        };
        $data = $this->getList();
        return $data;
    }
}
