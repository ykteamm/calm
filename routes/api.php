<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\MeditationController;
use App\Http\Controllers\Api\MeditatorController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::apiResource('category', CategoryController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('meditator', MeditatorController::class);
Route::post('meditator-avatar/{id}', [MeditatorController::class, 'avatarUpload'])->name('meditator-avatar');
Route::post('meditator-image/{id}', [MeditatorController::class, 'imageUpload'])->name('meditator-image');
Route::apiResource('meditation', MeditationController::class);
Route::apiResource('lesson', LessonController::class);
Route::post('lesson-audio-upload/{id}', [LessonController::class, 'audioUpload'])->name('lesson-audio-upload');
Route::post('lesson-audio-update/{id}/{audio}', [LessonController::class, 'audioUpdate'])->name('lesson-audio-update');
Route::delete('lesson-audio-delete/{id}/{audio}', [LessonController::class, 'audioDelete'])->name('lesson-audio-delete');
