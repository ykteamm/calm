<?php

use App\Http\Controllers\MeditationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'index'])->name('index');
Route::get('/last-reply', [ReplyController::class, 'lastReply'])->name('reply.last-reply');
Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store');
Route::get('meditation-views-inc/{meditation}', [MeditationController::class, 'incViewsValue'])->name('meditation-views-inc');