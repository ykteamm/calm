<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MeditatorController;
use App\Http\Controllers\MenuController;

Route::resource('/menu', MenuController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/language', LanguageController::class);
Route::resource('/meditator', MeditatorController::class);
Route::post('/meditator-avatar/{meditator}', [MeditatorController::class, 'avatarUpload'])->name('meditator-avatar');
Route::post('/meditator-image/{meditator}', [MeditatorController::class, 'imageUpload'])->name('meditator-image');
Route::get('/meditator-avatar/{meditator}', [MeditatorController::class, 'avatar'])->name('meditator-avatar-view');
Route::get('/meditator-image/{meditator}', [MeditatorController::class, 'image'])->name('meditator-image-view');