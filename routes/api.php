<?php

use App\Http\Controllers\Api\CategoryController;
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
