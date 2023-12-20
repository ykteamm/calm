<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;


Route::get('quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('quiz-result', [QuizController::class, 'quizResultView'])->name('quiz.result');