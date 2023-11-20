<?php

// use App\Http\Controllers\Api\MeditationController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::apiResource('category', CategoryController::class);
Route::apiResource('user', UserController::class);
Route::post('user-avatar-upload/{id}', [UserController::class, 'avatarUpload'])->name('user-avatar-upload');
Route::get('/',[TestController::class, 'index'])->name('index');



Route::resource('meditation', MeditationController::class);

Route::group(['middleware' => 'user.type:admin'], function () {
    Route::prefix('admin')->name('admin.')->group(base_path('routes/web/admin.php'));
});