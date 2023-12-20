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
use App\Services\LandscapeService;
use App\Services\MeditationService;
use App\Services\MotivationService;
use App\Services\QuestionService;
use App\Services\ReplyService;
use App\Services\VariantService;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
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
    protected LandscapeService $landscapeService; 
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
        ReplyService $replyService,
        LandscapeService $landscapeService
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
        $this->landscapeService = $landscapeService;
    }

    public function index()
    {
        $menus = $this->menuService->with(['translation'])->getList([]);
        return view('user.quiz.index', compact('menus'));
    }

    public function quizResultView()
    {
        $menus = $this->menuService->with(['translation'])->getList([]);
        return view('user.quiz.result', compact('menus'));
    }
}
