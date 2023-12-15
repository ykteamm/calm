<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TestController::class, 'index'])->name('index');
Route::get('menu/{slug}', [TestController::class, 'menu'])->name('menu-index');
Route::get('manzara', [TestController::class, 'manzara'])->name('manzara');
Route::post('feelings', [TestController::class, 'feelings'])->name('create-feelings');
Route::put('feelings/{id}', [TestController::class, 'Updatefeelings'])->name('update-feelings');

Route::get('test-start-view', [TestController::class, 'testStart'])->name('test-start-view');
Route::get('test-choose-issue-view', [TestController::class, 'chooseIssue'])->name('test-choose-issue-view');
Route::post('test-issue-result', [TestController::class, 'issueResult'])->name('test-issue-result');
Route::get('test-question-start-view', [TestController::class, 'questionStart'])->name('test-question-start-view');
Route::post('test-answer-question', [TestController::class, 'answerQuestion'])->name('test-answer-question');
Route::get('test-answer-question-view', [TestController::class, 'answerQuestionView'])->name('test-answer-question-view');
Route::get('test-answer-show', [TestController::class, 'answerShow'])->name('test-answer-show');

