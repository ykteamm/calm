<?php

namespace App\Http\Controllers;

use App\Models\Gratitude;
use App\Models\GratitudeTranslation;
use App\Models\IssueTranslation;
use App\Models\Motivation;
use App\Models\MotivationTranslation;
use App\Services\CategoryService;
use App\Controllers\CategoryController;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;


class TestController extends Controller
{

    protected CategoryService $service;
    protected MenuService $menu_service;
    public function __construct(CategoryService $service,MenuService $menu_service)
    {
        $this->service = $service;
        $this->menu_service = $menu_service;
    }
    public function index(IndexRequest $indexRequest)
    {

        $this->menu_service->willParseToRelation = [
            'translation',
            'categories' => [
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]
        ];
        $data = $this->menu_service->getList($indexRequest->validated());

        $time = date('H:i:s');
        $id = Motivation::inRandomOrder()
            ->select('id')->first();
        $motivation = MotivationTranslation::where('object_id', $id->id)->get();

        $graduate_id = Gratitude::inRandomOrder()->select('id')->first();
        $graduate = GratitudeTranslation::where('object_id', $graduate_id->id)->get();




//        dd($data[0]->categories[2]->meditations);
        return view("user.index",[
            'graduate'=>$graduate,
            'motivation'=>$motivation,
            'time'=>$time,
            'categories' => $data,
            'categories_sub' => $data[0]->categories
        ]);
    }

    public function manzara(IndexRequest $indexRequest)
    {

        $this->menu_service->willParseToRelation = [
            'translation',
            'categories' => [
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]
        ];
        $data = $this->menu_service->getList($indexRequest->validated());
        $time = date('H:i:s');
        $id = Motivation::inRandomOrder()
            ->select('id')->first();
        $motivation = MotivationTranslation::where('object_id', $id->id)->get();

        $graduate_id = Gratitude::inRandomOrder()->select('id')->first();
        $graduate = GratitudeTranslation::where('object_id', $graduate_id->id)->get();




        return view("user.manzara",[
            'graduate'=>$graduate,
            'motivation'=>$motivation,
            'time'=>$time,
            'categories' => $data,
            'categories_sub' => $data
        ]);
    }

    public function free(IndexRequest $indexRequest)
    {

        $this->menu_service->willParseToRelation = [
            'translation',
            'categories' => [
                'translation' => [],
                'meditations' => [
                    'meditator' => [
                        'image'=> [],
                        'avatar' => []
                    ],
                    'translation' => []
                ]
            ]
        ];
        $data = $this->menu_service->getList($indexRequest->validated());
        $time = date('H:i:s');
        $id = Motivation::inRandomOrder()
            ->select('id')->first();
        $motivation = MotivationTranslation::where('object_id', $id->id)->get();

        $graduate_id = Gratitude::inRandomOrder()->select('id')->first();
        $graduate = GratitudeTranslation::where('object_id', $graduate_id->id)->get();




        return view("user.free",[
            'graduate'=>$graduate,
            'motivation'=>$motivation,
            'time'=>$time,
            'categories' => $data,
            'categories_sub' => $data
        ]);
    }

    public function choose()
    {

        return view("user.free.choose");
    }

    public function choose_item(Request $request)
    {
        $data = $request->all();

//        $stress = $request->

        $issue = IssueTranslation::select('name','language_code')->get();

//        dd($issue);


        return view("user.free.choose_item",[
            'issue'=>$issue,
            'data'=>$data
        ]);
    }

    public function question()
    {
//        $data = $request->all();
//        dd($request->all());
        return view("user.free.question");
    }

    public function keep_awake(Request $request)
    {
//        $data = $request->all();
//        dd($request->all());
        return view("user.free.keep_awake");
    }

    public function morning_night()
    {

        return view("user.free.morning_night");
    }

    public function age()
    {

        return view("user.free.age");
    }

    public function age_metrics()
    {

        return view("user.free.age_metrics");
    }

    public function is_student()
    {

        return view("user.free.is_student");
    }

    public function medicate()
    {

        return view("user.free.medicate");
    }




}
