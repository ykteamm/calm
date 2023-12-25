<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Usertest;
use App\Services\CategoryService;
use App\Services\EmojiService;
use App\Services\GratitudeService;
use App\Services\IssueService;
use App\Services\LandscapeService;
use App\Services\MeditationService;
use App\Services\MotivationService;
use App\Services\PackageService;
use App\Services\QuestionService;
use App\Services\ReplyService;
use App\Services\VariantService;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
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
    protected PackageService $packageService;
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
        LandscapeService $landscapeService,
        PackageService $packageService
    )
    {
        $this->emojiService = $emojiService;
        $this->packageService = $packageService;
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
        if ($usertest = Usertest::orderBy('id', 'DESC')->first()) {
            if ($done = Session::get('quiz')) {
                Session::remove('quiz');
            }
            // dd(json_decode(auth()->user()->tests->toArray()[0]['packages'],true));
            return view('user.quiz.result', [
                'done' => $done
            ]);
        }
        return view('user.quiz.index');
    }

    public function quiz()
    {
        return view('user.quiz.quiz');
    }

    public function quizResultView()
    {
        if ($done = Session::get('quiz')) {
            Session::remove('quiz');
        }
        // dd(json_decode(auth()->user()->tests->toArray()[0]['packages'],true));
        return view('user.quiz.result', [
            'done' => $done
        ]);
    }
   
    public function packages()
    {
        if ($usertests = Usertest::orderBy('id', 'DESC')->first()) {
            $packages = json_decode($usertests->packages);
            $result = [];
            foreach ($packages as $id => $value) {
                if ($value < 60) {
                    $result[$id] = $value;
                }
            }
            $all = [];
            $i = 0;
            while (count($all) < 4) {
                $i++;
                foreach ($result as $id => $value) {
                    if (count($all) > 4) {
                        break;
                    }
                    $this->packageService->willParseToRelation = ['image', 'translation', 'medicines'];
                    $package = $this->packageService->show($id);
                    $package->medicines = ($package->medicines()->with('translation')->get());
                    $all[] = $package;
                }
                if($i == 50) {
                    break;
                }
            }   
            // dd($all);
            return view('user.quiz.packages',[
                'packages' => $all
            ]);
        }
    }

    public function chart()
    {
        return view('user.quiz.chart');
    }
}
