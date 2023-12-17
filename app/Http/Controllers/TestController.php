<?php

namespace App\Http\Controllers;

use App\Models\Feeling;
use App\Services\CategoryService;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;
use App\Services\EmojiService;
use App\Services\GratitudeService;
use App\Services\IssueService;
use App\Services\MeditationService;
use App\Services\MotivationService;
use App\Services\QuestionService;
use App\Services\ReplyService;
use App\Services\VariantService;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    protected MenuService $menuService;
    protected EmojiService $emojiService;
    protected CategoryService $categoryService;
    protected MeditationService $meditationService;
    protected IssueService $issueService;
    protected QuestionService $questionService;
    protected VariantService $variantService;
    protected MotivationService $motivationService;
    protected GratitudeService $gratitudeService;
    protected ReplyService $replyService;
    public function __construct(
        MenuService $menuService,
        EmojiService $emojiService,
        CategoryService $categoryService,
        MeditationService $meditationService,
        IssueService $issueService,
        QuestionService $questionService,
        VariantService $variantService,
        MotivationService $motivationService,
        GratitudeService $gratitudeService,
        ReplyService $replyService
    )
    {
        $this->menuService = $menuService;
        $this->emojiService = $emojiService;
        $this->categoryService = $categoryService;
        $this->meditationService = $meditationService;
        $this->issueService = $issueService;
        $this->questionService = $questionService;
        $this->variantService = $variantService;
        $this->motivationService = $motivationService;
        $this->gratitudeService = $gratitudeService;
        $this->replyService = $replyService;
    }

    public function index(IndexRequest $indexRequest)
    {
        if (auth()->check()){
            $time = date('H:i:s');                    
            $user_emoj_have = Feeling::where('user_id',auth()->user()->id)->first();
            $emoj_have = Feeling::get();
            $replyToday = $this->replyService->today();
            $replyLast = $this->replyService->last();
            $todayRepliedGratitude = $this->gratitudeService->todayRepliedGratitude($replyToday);
            $lastRepliedGratitude = $this->gratitudeService->lastRepliedGratitude($replyLast);
            $gratitude = $this->gratitudeService->random(['translation']);
            $emojies = $this->emojiService->withRelation(['image'])->getList([]);
            $motivation = $this->motivationService->random(['translation']);
            $menus = $this->menuService->with(['translation'])->getList([]);
            $popularMeditations = $this->meditationService->popular();
            $recentlyViewedMeditations = $this->meditationService->recentlyViewed();
            $meditations = $this->categoryService->getMeditationsForUser();
            return view("user.index",[
                'user_emoj_have' => $user_emoj_have,
                'emoj_have' => $emoj_have,
                'emoji' => $emojies,
                'gratitude' => $gratitude,
                'todayRepliedGratitude' => $todayRepliedGratitude,
                'lastRepliedGratitude' => $lastRepliedGratitude,
                'emojies' => $emojies,
                'motivation' => $motivation,
                'menus' => $menus,
                'time' => $time,
                'popularMeditations' => $popularMeditations,
                'recentlyViewedMeditations' => $recentlyViewedMeditations,
                'meditations' => $meditations
            ]);
        } else {
            return view("user.test.start");
        }
    }

    public function menu(IndexRequest $indexRequest, $slug)
    {
        $time = date('H:i:s');                    
        $user_emoj_have = Feeling::where('user_id',auth()->user()->id)->first();
        $emoj_have = Feeling::get();
        $replyToday = $this->replyService->today();
        $replyLast = $this->replyService->last();
        $todayRepliedGratitude = $this->gratitudeService->todayRepliedGratitude($replyToday);
        $lastRepliedGratitude = $this->gratitudeService->lastRepliedGratitude($replyLast);
        $gratitude = $this->gratitudeService->random(['translation']);
        $emojies = $this->emojiService->withRelation(['image'])->getList([]);
        $motivation = $this->motivationService->random(['translation']);
        $menus = $this->menuService->with(['translation'])->getList([]);
        $popularMeditations = $this->meditationService->popular();
        $recentlyViewedMeditations = $this->meditationService->recentlyViewed();
        $meditations = $this->categoryService->getMeditationsForMenu($slug);
        return view("user.menu",[
            'user_emoj_have' => $user_emoj_have,
            'emoj_have' => $emoj_have,
            'emoji' => $emojies,
            'gratitude' => $gratitude,
            'todayRepliedGratitude' => $todayRepliedGratitude,
            'lastRepliedGratitude' => $lastRepliedGratitude,
            'emojies' => $emojies,
            'motivation' => $motivation,
            'menus' => $menus,
            'time' => $time,
            'popularMeditations' => $popularMeditations,
            'recentlyViewedMeditations' => $recentlyViewedMeditations,
            'meditations' => $meditations
        ]);
    }


    public function landscape(IndexRequest $indexRequest)
    {
        
        $menus = $this->menuService->with(['translation'])->getList([]);
        return view("user.landscape",[
            'menus' => $menus,
        ]);
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
        $this->issueService->queryClosure = fn ($q) => $q->whereIn('id', $issues);
        $issues = $this->issueService->getList([]);
        return view("user.test.issue-result", compact('issues'));
    }

    public function questionStart()
    {
        $this->questionService->willParseToRelation = [
            'translation', 'variants' => ['translation' => []]
        ];
        $issues = $this->getSession('issues');
        $this->questionService->queryClosure = fn ($q) => $q->whereIn('issue_id', $issues)->limit(4);
        $questionIds = $this->questionService->getList([])->pluck('id')->toArray();
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
        $this->variantService->queryClosure = fn ($q) => $q->whereIn('id', $variants);
        $variants = $this->variantService->getList([]);
        return view('user.test.answers', compact('variants'));
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
