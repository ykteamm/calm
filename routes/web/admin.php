<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\MeditatorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MotivationController;

Route::get('/', [MenuController::class, 'index']);
Route::resource('/menu', MenuController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/language', LanguageController::class);
Route::resource('/meditator', MeditatorController::class);
Route::post('/meditator-upload/{meditator}', [MeditatorController::class, 'upload'])->name('meditator-upload');
Route::post('/meditator-reupload/{meditator}/{asset}', [MeditatorController::class, 'reupload'])->name('meditator-reupload');
Route::delete('/meditator-unupload/{meditator}/{asset}', [MeditatorController::class, 'unupload'])->name('meditator-unupload');
Route::get('/meditator-avatar/{meditator}', [MeditatorController::class, 'avatar'])->name('meditator-avatar-view');
Route::get('/meditator-image/{meditator}', [MeditatorController::class, 'image'])->name('meditator-image-view');
Route::resource('/meditation', MeditationController::class);
Route::resource('/lesson', LessonController::class);
Route::get('/lesson-audio-upload/{lesson}', [LessonController::class, 'audioCreate'])->name('lesson-audio-upload-view');
Route::post('/lesson-audio-upload/{lesson}', [LessonController::class, 'audioStore'])->name('lesson-audio-upload');
Route::post('/lesson-audio-update/{lesson}/{audio}', [LessonController::class, 'audioUpdate'])->name('lesson-audio-update');
Route::get('/lesson-audio-update/{lesson}/{audio}', [LessonController::class, 'audioEdit'])->name('lesson-audio-update-view');
Route::get('/lesson-audio-download/{lesson}/{audio}', [LessonController::class, 'audioDownload'])->name('lesson-audio-download');
Route::delete('/lesson-audio-delete/{lesson}/{audio}', [LessonController::class, 'audioDelete'])->name('lesson-audio-delete');
Route::resource('/motivation', MotivationController::class);