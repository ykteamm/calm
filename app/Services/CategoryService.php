<?php
namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;
use App\Http\Resources\CategoryResource;

class CategoryService extends BaseService
{
    protected QuestionService $questionService;
    public function __construct(
        Category $serviceModel,
        QuestionService $questionService
    )
    {
        $this->questionService = $questionService;
        $this->model = $serviceModel;
        $this->resource = CategoryResource::class;

        $this->relationLikableFields = [
            'translations' => 'name'
        ];

        $this->equalableFields = [
            'id'
        ];
        parent::__construct();
    }

    public function getMeditationsAll()
    {
        $this->setQuery();
        $data = $this->query
            ->with(parseToRelation([
                'translation' => [],
                'meditations' => [
                    fn ($q) => $q->has('lessons'),
                    'usershows' => function ($q) {
                        $q->where('user_id', getProp(auth()->user(), 'id'));
                    },
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'lessons' => function($q) {
                        $q->selectRaw("id,meditation_id,block,daily,duration");
                        // $q->leftJoin('usershows', 'usershows.lesson_id', 'lessons.id');
                        $q->with(['audio', 'image', 'translation']);
                    },
                    'translation' => []
                ]
            ]))
            ->get();
        return $data;
    }

    public function getMeditationsForUser()
    {
        $categories = $this->questionService->userCategories();
        $this->setQuery();
        $data = $this->query
            ->whereIn('id', $categories)
            ->with(parseToRelation([
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]))
            ->get();
        return $data;
    }

    public function getByName($name)
    {
        $this->setQuery();
        return $this->query->where(function ($q) use ($name) {
            $q->whereHas('translations', function($q) use ($name){
                $q->where('name', 'ilike', "$name%");
            }); 
        })->first();
    }
}
