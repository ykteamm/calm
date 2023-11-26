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


Route::get('/login', [AuthController::class, 'loginView'])->name('login');

Route::prefix('auth')->name('auth.')->group(base_path('routes/web/auth.php'));
Route::group([], function () {
    Route::name('')->group(base_path('routes/web/user.php'));
});
Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
    Route::prefix('admin')->name('admin.')->group(base_path('routes/web/admin.php'));
});