<?php

namespace App\Http\Controllers;

use App\Models\Feeling;
use App\Models\Gratitude;
use App\Models\GratitudeTranslation;
use App\Models\IssueTranslation;
use App\Models\Motivation;
use App\Models\MotivationTranslation;
use App\Models\Reply;
use App\Services\CategoryService;
use App\Controllers\CategoryController;
use App\Services\MenuService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;
use App\Services\EmojiService;
use App\Services\MeditationService;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    protected CategoryService $service;
    protected MenuService $menu_service;
    protected EmojiService $emojiService;
    protected CategoryService $categoryService;
    protected MeditationService $meditationService;
    public function __construct(
        CategoryService $service,
        MenuService $menu_service,
        EmojiService $emojiService,
        CategoryService $categoryService,
        MeditationService $meditationService
    )
    {
        $this->service = $service;
        $this->menu_service = $menu_service;
        $this->emojiService = $emojiService;
        $this->categoryService = $categoryService;
        $this->meditationService = $meditationService;
    }

    public function menu(IndexRequest $indexRequest, $slug)
    {
        $this->menu_service->willParseToRelation = [
            'translation'
        ];
        $data = $this->menu_service->getList($indexRequest->validated());
        $categories = $this->categoryService->getByMenuSlug($slug);
        $time = date('H:i:s');
        $id = Motivation::inRandomOrder()
            ->select('id')->first();
        $motivation = MotivationTranslation::where('object_id', $id->id)->get();

        $graduate_id = Gratitude::inRandomOrder()->select('id')->first();
        $graduate = GratitudeTranslation::where('object_id', $graduate_id->id)->get();
        $emojies = $this->emojiService->withRelation(['image'])->getList([]);
        $recentlyViewed = $this->meditationService->recentlyViewed([]);


        // return $data[0]->categories;
//        dd($data[0]->categories[2]->meditations);
        return view("user.menu",[
            'emojies' => $emojies,
            'graduate'=>$graduate,
            'motivation'=>$motivation,
            'time'=>$time,
            'menus' => $data,
            'categories_sub' => $categories,
            'recentlyViewed' => $recentlyViewed
        ]);
    }

    public function index(IndexRequest $indexRequest)
    {
        if (auth()->check()){

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

//        return $data;

        $time = date('H:i:s');
        $id = Motivation::inRandomOrder()
            ->select('id')->first();
        $motivation = MotivationTranslation::where('object_id', $id->id)->get();

        $graduate_id = Gratitude::inRandomOrder()->select('id')->first();
        $graduate = GratitudeTranslation::where('object_id', $graduate_id->id)->get();
        $emojies = $this->emojiService->withRelation(['image'])->getList([]);

        $reply = Reply::where('user_id', auth()->user()->id)
            ->select('id','text','user_id','gratitude_id','created_at')
            ->orderBy('created_at','desc')
            ->get();


//        return $reply;


        $reply_for = Reply::
        select('user_id', 'gratitude_id', 'replies.created_at','gratitude_translations.name', 'gratitude_translations.language_code')
            ->join('gratitude_translations', function ($join) {
                $join->on('replies.gratitude_id', '=', 'gratitude_translations.object_id')
                    ->whereIn('gratitude_translations.language_code', ['uz', 'ru', 'en']);
            })
            ->groupBy('user_id','replies.created_at', 'gratitude_id', 'gratitude_translations.name', 'gratitude_translations.language_code')
            ->orderBy('replies.created_at', 'desc')
            ->get();

//        return $reply_for;
        $user_reply_create = Reply::where('user_id', auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->first();
//        return $user_reply_create;


        $user_reply_have = Reply::where('user_id',auth()->user()->id)->first();

//        return $user_reply_have;

//        return $reply_for;


        $emojies = $this->emojiService->getList($indexRequest);

//        return $emojies;

        $user_emoj_have = Feeling::where('user_id',auth()->user()->id)->first();

        $emoj_have = Feeling::get();


        return view("user.index",[
            'user_reply_create'=>$user_reply_create,
            'user_reply_have'=>$user_reply_have,
            'reply_for'=>$reply_for,
            'user_emoj_have'=>$user_emoj_have,
            'emoj_have'=>$emoj_have,
            'emoji'=>$emojies,
            'reply'=>$reply,
            'emojies' => $emojies,
            'graduate'=>$graduate,
            'motivation'=>$motivation,
            'time'=>$time,
            'menus' => $data,
            'categories_sub' => $data[0]->categories
        ]);
        }else{
            return view("user.free");
//            abort(404);
        }
    }

    public function feelings(Request $request)
    {
//        $data = $request->all();

        $data = new Feeling();
        $data->user_id = $request->user_id;
        $data->emoji_id = $request->emoji_id;
        $data->status = 10;

        if (!$data->save()){
            return redirect(route('index'))->with('error','Your emoj doesn\'t create');
        }
        return redirect(route('index'))->with('success','Your emoj successfull create!');

//        return  $data;
//        return view("user.index");
    }

    public function Updatefeelings(Request $request, $id)
    {
        $user_data = Feeling::find($id);
        $input = $request->all();
//        return $input;
        $user_data->update($input);

        $user_data->user_id = $request->user_id;
        $user_data->emoji_id = $request->emoji_id;
        $user_data->status = 10;

        if (!$user_data->save()){
            return redirect(route('index'))->with('error','Your emoj doesn\'t update');
        }
        return redirect(route('index'))->with('success','Your emoj successfull update!');

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

        $question_data = DB::table('variants')
            ->join('variant_translations', 'variants.id', '=', 'variant_translations.object_id')
            ->join('questions', 'variants.question_id', '=', 'questions.id')
            ->join('question_translations', 'questions.id', '=', 'question_translations.object_id')
            ->join('issues', 'questions.issue_id', '=', 'issues.id')
            ->join('issue_translations', 'issues.id', '=', 'issue_translations.object_id')
            ->select(
                'issues.id as issue_id',
                'issue_translations.name as issue_name',
                'issue_translations.language_code as issue_language_code',
                'questions.id as question_id',
                'question_translations.name as question_name',
                'question_translations.language_code as question_language_code',
                'variants.id as variant_id',
                'variant_translations.name as variant_name',
                'variant_translations.answer as variant_answer',
                'variant_translations.language_code as variant_language_code',
            )
            ->where('issue_translations.language_code', '=', 'uz')
            ->where('question_translations.language_code', '=', 'uz')
            ->where('questions.id', '=', 1)
            ->where('variant_translations.language_code', '=', 'uz')
            ->get();


//        return $question_data;


//        return $variants;
//        $data = $request->all();
//        dd($request->all());
        return view("user.free.question",[
            'question_data'=>$question_data,
        ]);
    }

    public function keep_awake()
    {
        $question_data = DB::table('variants')
            ->join('variant_translations', 'variants.id', '=', 'variant_translations.object_id')
            ->join('questions', 'variants.question_id', '=', 'questions.id')
            ->join('question_translations', 'questions.id', '=', 'question_translations.object_id')
            ->join('issues', 'questions.issue_id', '=', 'issues.id')
            ->join('issue_translations', 'issues.id', '=', 'issue_translations.object_id')
            ->select(
                'issues.id as issue_id',
                'issue_translations.name as issue_name',
                'issue_translations.language_code as issue_language_code',
                'questions.id as question_id',
                'question_translations.name as question_name',
                'question_translations.language_code as question_language_code',
                'variants.id as variant_id',
                'variant_translations.name as variant_name',
                'variant_translations.answer as variant_answer',
                'variant_translations.language_code as variant_language_code',
            )
            ->where('issue_translations.language_code', '=', 'uz')
            ->where('question_translations.language_code', '=', 'uz')
            ->where('questions.id', '=', 2)
            ->where('variant_translations.language_code', '=', 'uz')
            ->get();
//        return $keep_data;

        return view("user.free.keep_awake",[
            'question_data'=>$question_data,
            ]);
    }

    public function morning_night()
    {
        $question_data = DB::table('variants')
            ->join('variant_translations', 'variants.id', '=', 'variant_translations.object_id')
            ->join('questions', 'variants.question_id', '=', 'questions.id')
            ->join('question_translations', 'questions.id', '=', 'question_translations.object_id')
            ->join('issues', 'questions.issue_id', '=', 'issues.id')
            ->join('issue_translations', 'issues.id', '=', 'issue_translations.object_id')
            ->select(
                'issues.id as issue_id',
                'issue_translations.name as issue_name',
                'issue_translations.language_code as issue_language_code',
                'questions.id as question_id',
                'question_translations.name as question_name',
                'question_translations.language_code as question_language_code',
                'variants.id as variant_id',
                'variant_translations.name as variant_name',
                'variant_translations.answer as variant_answer',
                'variant_translations.language_code as variant_language_code',
            )
            ->where('issue_translations.language_code', '=', 'uz')
            ->where('question_translations.language_code', '=', 'uz')
            ->where('questions.id', '=', 3)
            ->where('variant_translations.language_code', '=', 'uz')
            ->get();

//        return $question_data;

        return view("user.free.morning_night",[
            'question_data'=>$question_data,
        ]);
    }

        public function xavotir()
    {
        $question_data = DB::table('variants')
            ->join('variant_translations', 'variants.id', '=', 'variant_translations.object_id')
            ->join('questions', 'variants.question_id', '=', 'questions.id')
            ->join('question_translations', 'questions.id', '=', 'question_translations.object_id')
            ->join('issues', 'questions.issue_id', '=', 'issues.id')
            ->join('issue_translations', 'issues.id', '=', 'issue_translations.object_id')
            ->select(
                'issues.id as issue_id',
                'issue_translations.name as issue_name',
                'issue_translations.language_code as issue_language_code',
                'questions.id as question_id',
                'question_translations.name as question_name',
                'question_translations.language_code as question_language_code',
                'variants.id as variant_id',
                'variant_translations.name as variant_name',
                'variant_translations.answer as variant_answer',
                'variant_translations.language_code as variant_language_code',
            )
            ->where('issue_translations.language_code', '=', 'uz')
            ->where('question_translations.language_code', '=', 'uz')
            ->where('questions.id', '=', 4)
            ->where('variant_translations.language_code', '=', 'uz')
            ->get();

        return view("user.free.xavotir",[
            'question_data'=>$question_data,
        ]);
    }

    public function depressiya()
    {
        $question_data = DB::table('variants')
            ->join('variant_translations', 'variants.id', '=', 'variant_translations.object_id')
            ->join('questions', 'variants.question_id', '=', 'questions.id')
            ->join('question_translations', 'questions.id', '=', 'question_translations.object_id')
            ->join('issues', 'questions.issue_id', '=', 'issues.id')
            ->join('issue_translations', 'issues.id', '=', 'issue_translations.object_id')
            ->select(
                'issues.id as issue_id',
                'issue_translations.name as issue_name',
                'issue_translations.language_code as issue_language_code',
                'questions.id as question_id',
                'question_translations.name as question_name',
                'question_translations.language_code as question_language_code',
                'variants.id as variant_id',
                'variant_translations.name as variant_name',
                'variant_translations.answer as variant_answer',
                'variant_translations.language_code as variant_language_code',
            )
            ->where('issue_translations.language_code', '=', 'uz')
            ->where('question_translations.language_code', '=', 'uz')
            ->where('questions.id', '=', 5)
            ->where('variant_translations.language_code', '=', 'uz')
            ->get();

        return view("user.free.depressiya",[
            'question_data'=>$question_data,
        ]);
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
