<?php

namespace App\Http\Controllers;

use App\Enums\MeditationGroupEnum;
use App\Models\Feeling;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;
use App\Models\Question;
use App\Models\Variant;
use App\Models\VariantTranslation;
use App\Services\EmojiService;
use App\Services\GratitudeService;
use App\Services\IssueService;
use App\Services\LandscapeService;
use App\Services\MeditationService;
use App\Services\MotivationService;
use App\Services\QuestionService;
use App\Services\ReplyService;
use App\Services\VariantService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected EmojiService $emojiService;
    protected CategoryService $categoryService;
    protected MeditationService $meditationService;
    protected IssueService $issueService;
    protected QuestionService $questionService;
    protected VariantService $variantService;
    protected MotivationService $motivationService;
    protected GratitudeService $gratitudeService;
    protected ReplyService $replyService;
    protected LandscapeService $landscapeService;
    public function __construct(
        EmojiService $emojiService,
        CategoryService $categoryService,
        MeditationService $meditationService,
        IssueService $issueService,
        QuestionService $questionService,
        VariantService $variantService,
        MotivationService $motivationService,
        GratitudeService $gratitudeService,
        ReplyService $replyService,
        LandscapeService $landscapeService
    )
    {
        $this->emojiService = $emojiService;
        $this->categoryService = $categoryService;
        $this->meditationService = $meditationService;
        $this->issueService = $issueService;
        $this->questionService = $questionService;
        $this->variantService = $variantService;
        $this->motivationService = $motivationService;
        $this->gratitudeService = $gratitudeService;
        $this->replyService = $replyService;
        $this->landscapeService = $landscapeService;
    }


    public function main(IndexRequest $indexRequest)
    {
        $time = date('H:i:s');
        $user_emoj_have = null;
        $emoj_have = Feeling::get();
        $replyToday = $this->replyService->today();
        $replyLast = $this->replyService->last();
        $todayRepliedGratitude = $this->gratitudeService->todayRepliedGratitude($replyToday);
        $lastRepliedGratitude = $this->gratitudeService->lastRepliedGratitude($replyLast);
        $gratitude = $this->gratitudeService->random(['translation']);
        $emojies = $this->emojiService->withRelation(['image'])->getList([]);
        $motivation = $this->motivationService->random(['translation']);
        $popularMeditations = $this->meditationService->popular();
        $recentlyViewedMeditations = $this->meditationService->recentlyViewed();
        $meditations = $this->categoryService->getMeditationsAll();
        $single = MeditationGroupEnum::SINGLE;

        // return $meditations;
        // dd($meditations[2]->meditations);
        return view("user.index", [
            'user_emoj_have' => $user_emoj_have,
            'emoj_have' => $emoj_have,
            'emoji' => $emojies,
            'gratitude' => $gratitude,
            'todayRepliedGratitude' => $todayRepliedGratitude,
            'lastRepliedGratitude' => $lastRepliedGratitude,
            'emojies' => $emojies,
            'motivation' => $motivation,
            'time' => $time,
            'popularMeditations' => $popularMeditations,
            'recentlyViewedMeditations' => $recentlyViewedMeditations,
            'meditations' => $meditations,
            'single' => $single
        ]);
    }

    public function index(IndexRequest $indexRequest)
    {
        if (Auth::user()){
            $time = date('H:i:s');
            $user_emoj_have = Feeling::where('user_id', getProp(auth()->user(), 'id'))->first();
            $emoj_have = Feeling::get();
            $replyToday = $this->replyService->today();
            $replyLast = $this->replyService->last();
            $todayRepliedGratitude = $this->gratitudeService->todayRepliedGratitude($replyToday);
            $lastRepliedGratitude = $this->gratitudeService->lastRepliedGratitude($replyLast);
            $gratitude = $this->gratitudeService->random(['translation']);
            $emojies = $this->emojiService->withRelation(['image'])->getList([]);
            $motivation = $this->motivationService->random(['translation']);
            $popularMeditations = $this->meditationService->popular();
            $recentlyViewedMeditations = $this->meditationService->recentlyViewed();
            $meditations = $this->categoryService->getMeditationsAll();
            $single = MeditationGroupEnum::SINGLE;

//            return  $time;
            // return $meditations;
            // dd($meditations[2]->meditations);
            return view("user.index",[
                'user_emoj_have' => $user_emoj_have,
                'emoj_have' => $emoj_have,
                'emoji' => $emojies,
                'gratitude' => $gratitude,
                'todayRepliedGratitude' => $todayRepliedGratitude,
                'lastRepliedGratitude' => $lastRepliedGratitude,
                'emojies' => $emojies,
                'motivation' => $motivation,
                'time' => $time,
                'popularMeditations' => $popularMeditations,
                'recentlyViewedMeditations' => $recentlyViewedMeditations,
                'meditations' => $meditations,
                'single' => $single
            ]);
        }else{
            return view('auth.login');
        }

//         if (auth()->check()){
//         } else {
//             return view("user.test.start");
//         }
    }

    public function meditatorsAll(IndexRequest $indexRequest)
    {
        $popularMeditations = $this->meditationService->popular();
        $meditations = $this->categoryService->getMeditationsAll();
        return view("user.meditators_all",[
            'popularMeditations' => $popularMeditations,
            'meditations' => $meditations
        ]);
    }


    public function landscape(IndexRequest $indexRequest)
    {
        $this->landscapeService->willParseToRelation = ['video', 'audio', 'image'];
        $this->landscapeService->queryClosure = fn ($q) => $q->has('video');
        $landscapes = $this->landscapeService->getList([]);
        return view("user.landscape",compact('landscapes'));
    }


    public function testStart(IndexRequest $indexRequest)
    {
        return view("user.test.start");
    }

    public function chooseIssue()
    {
        $this->issueService->willParseToRelation = [
            'translation', 'image'
        ];
        $issues = $this->issueService->getList([]);
        return view("user.test.issue", compact('issues'));
    }

    public function issueResult(Request $request)
    {
        $issues = $request->input('issues', []);
        $this->setSession('issues', $issues);
        $this->issueService->willParseToRelation = [
            'translation', 'image'
        ];
        $questtion = Question::where('id','>=',1)->update([
            'issue_id' => $issues[0],
        ]);
        $this->issueService->queryClosure = fn ($q) => $q->whereIn('id', $issues);
        $issues = $this->issueService->getList([]);
        return view("user.test.issue-result", compact('issues'));
    }

    public function questionStart()
    {
        $this->questionService->willParseToRelation = [
            'translation', 'variants' => ['translation' => []]
        ];

        // if($this->getSession('test_begin'))
        // {
        //     $questions = $this->getSession('test_begin');
        //     $question_id = Question::whereNotIn('id',$questions)->first();

        //     $this->setSession('test_begin', array_push($arr,$question_id->id));

        // }else{
        //     $arr = [];
        //     $question_id = Question::whereNotIn('id',$arr)->first();
        //     $this->setSession('test_begin', $arr);

        // }






        $issues = $this->getSession('issues');
        $this->questionService->queryClosure = fn ($q) => $q->whereIn('issue_id', $issues)->limit(4);
        $questionIds = $this->questionService->getList([])->pluck('id')->toArray();

        // $this->questionService->queryClosure = fn ($q) => $q->where('id', $question_id->id)->get();
        // $questionIds = $this->questionService->getList([])->pluck('id')->toArray();

        $this->setSession('questions', $questionIds);

        return redirect(route('test-answer-question-view'));
    }

    public function answerQuestion(Request $request)
    {
        $this->rmSession('questions', $request->input('question_id'));
        $this->setSession('variants', $request->input('variant_id'));
        $questions = $this->getSession('questions');
        if(!empty($questions)) {
            return redirect(route('test-answer-question-view'));
        } else {
            return redirect(route('test-answer-show'));
        }
    }

    public function answerQuestionView()
    {
        $questions = $this->getSession('questions');
        $this->questionService->willParseToRelation = [
            'translation', 'variants' => ['translation' => []]
        ];
        $question = $this->questionService->show($this->rand($questions));
        return view('user.test.question-answer', compact('question'));
    }

    public function answerShow()
    {
        $variants = $this->getSession('variants');
        $this->variantService->willParseToRelation = [
            'translation'
        ];

        $ball = VariantTranslation::whereIn('id', $variants)->sum('ball');

        $this->variantService->queryClosure = fn ($q) => $q->whereIn('id', $variants);
        $variants = $this->variantService->getList([]);
        return view('user.test.answers', compact('variants','ball'));
    }

    protected function rand($array)
    {
        $count = count($array);
        return $array[rand(0, ($count-1))];
    }

    protected function setSession($key, $data)
    {
        if(!is_array($data)) {
            $temp = $this->getSession($key);
            $temp[] = $data;
            $data = $temp;
        }
        Session::put($key, implode(',', $data));
    }

    protected function rmSession($key, $item)
    {
        $temp = $this->getSession($key);
        if(!is_array($item)) {
            for ($i = 0; $i < count($temp); $i++) {
                if($temp[$i] == $item) {
                    unset($temp[$i]);
                }
            }
        }
        Session::put($key, implode(',', $temp));
    }

    protected function getSession($key)
    {
        if($data = Session::get($key)) {
            return explode(',', $data);
        } else return [];
    }
}
