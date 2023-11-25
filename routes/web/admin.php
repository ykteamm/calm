<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\MeditatorController;
use App\Http\Controllers\MenuController;

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
Route::post('/meditator-audio-upload/{meditation}', [MeditationController::class, 'audioStore'])->name('meditation-audio-upload');
Route::get('/meditation-audio-upload/{meditation}', [MeditationController::class, 'audioCreate'])->name('meditation-audio-upload-view');
Route::post('/meditator-audio-update/{meditation}/{audio}', [MeditationController::class, 'audioUpdate'])->name('meditation-audio-update');
Route::get('/meditator-audio-update/{meditation}/{audio}', [MeditationController::class, 'audioEdit'])->name('meditation-audio-update-view');
Route::get('/meditator-audio-download/{meditation}/{audio}', [MeditationController::class, 'audioDownload'])->name('meditation-audio-download');
Route::delete('/meditator-audio-delete/{meditation}/{audio}', [MeditationController::class, 'audioDelete'])->name('meditation-audio-delete');
