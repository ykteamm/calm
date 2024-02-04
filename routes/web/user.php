<?php

use App\Http\Controllers\AimController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::post('reply', [ReplyController::class, 'store'])->name('reply.store');
    Route::post('create-reply', [ReplyController::class, 'createReply'])->name('create-reply');
    Route::post('user-image-upload', [UserController::class, 'upload'])->name('user-image-upload');
    Route::post('user-image-reupload/{asset}', [UserController::class, 'reupload'])->name('user-image-reupload');
    Route::delete('user-image-unupload/{asset}', [UserController::class, 'unupload'])->name('user-image-unupload');
});
Route::get('meditation-mark-as-viewed/{meditation}', [MeditationController::class, 'markAsViewed'])->name('meditation-mark-as-viewed');
Route::get('meditation-recently-viewed', [MeditationController::class, 'recentlyViewed'])->name('meditation-recently-viewed');
Route::get('meditation-popular-by-category', [MeditationController::class, 'popularByCategory'])->name('meditation-popular-by-category');
Route::get('last-reply', [ReplyController::class, 'lastReply'])->name('reply.last-reply');
Route::get('user-image-view', [UserController::class, 'image'])->name('user-image-view');
Route::get('lesson/{lesson}', [LessonController::class, 'lessonUserShow'])->name('lesson.user.show');
Route::get('meditation/{meditation}', [MeditationController::class, 'play'])->name('meditation.show');
