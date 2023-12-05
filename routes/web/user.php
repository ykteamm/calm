<?php

use App\Http\Controllers\MeditationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'index'])->name('index');
//Route::post('/', [TestController::class, 'index'])->name('index');
Route::get('/manzara', [TestController::class, 'manzara'])->name('manzara');
Route::get('/free', [TestController::class, 'free'])->name('free');


Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
    Route::get('/last-reply', [ReplyController::class, 'lastReply'])->name('reply.last-reply');
    Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store');
    Route::post('/create-reply', [ReplyController::class, 'Createreply'])->name('create-reply');
    Route::get('meditation-mark-as-viewed/{meditation}', [MeditationController::class, 'markAsViewed'])->name('meditation-mark-as-viewed');
    Route::get('meditation-recently-viewed', [MeditationController::class, 'recentlyViewed'])->name('meditation-recently-viewed');
    Route::get('meditation-popular-by-category', [MeditationController::class, 'popularByCategory'])->name('meditation-popular-by-category');

});
