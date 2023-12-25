<?php

use App\Http\Controllers\FeelingController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('meditators-all', [MainController::class, 'meditatorsAll'])->name('meditators-all');
Route::get('landscape', [MainController::class, 'landscape'])->name('landscape');
Route::get('test-start-view', [MainController::class, 'testStart'])->name('test-start-view');
Route::get('test-choose-issue-view', [MainController::class, 'chooseIssue'])->name('test-choose-issue-view');
Route::post('test-issue-result', [MainController::class, 'issueResult'])->name('test-issue-result');
Route::get('test-question-start-view', [MainController::class, 'questionStart'])->name('test-question-start-view');
Route::post('test-answer-question', [MainController::class, 'answerQuestion'])->name('test-answer-question');
Route::get('test-answer-question-view', [MainController::class, 'answerQuestionView'])->name('test-answer-question-view');
Route::get('test-answer-show', [MainController::class, 'answerShow'])->name('test-answer-show');
Route::resource('feeling', FeelingController::class);