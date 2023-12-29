<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;


Route::get('medicine', [QuizController::class, 'index'])->name('medicine.index');
Route::get('medicine/return', [QuizController::class, 'return'])->name('medicine.return');
Route::get('quiz', [QuizController::class, 'quiz'])->name('quiz.index');
Route::get('quiz-result', [QuizController::class, 'quizResultView'])->name('quiz.result');
Route::get('packages-info', [QuizController::class, 'packages'])->name('packages.info');
Route::get('chart', [QuizController::class, 'chart'])->name('chart.info');
