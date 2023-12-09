<?php

// use App\Http\Controllers\Api\MeditationController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Counter;
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


// Route::get('/login', [AuthController::class, 'loginView'])->name('login');

//Route::prefix('auth')->name('auth.')->group(base_path('routes/web/auth.php'));

Route::post('/free/choose', [TestController::class, 'choose'])->name('/free-choose');

Route::post('/free/choose/item', [TestController::class, 'choose_item'])->name('free-choose-item');

Route::post('/free/choose/question', [TestController::class, 'question'])->name('free-choose-question');

Route::post('/free/choose/keep_awake', [TestController::class, 'keep_awake'])->name('free-choose-keep_awake');

Route::post('/free/choose/morning_night', [TestController::class, 'morning_night'])->name('free-choose-morning_night');

Route::post('/free/choose/xavotir', [TestController::class, 'xavotir'])->name('free-choose-xavotir');

Route::post('/free/choose/depressiya', [TestController::class, 'depressiya'])->name('free-choose-depressiya');

Route::post('/free/choose/age', [TestController::class, 'age'])->name('free-choose-age');

Route::post('/free/choose/age_metrics', [TestController::class, 'age_metrics'])->name('free-choose-age_metrics');

Route::post('/free/choose/is_student', [TestController::class, 'is_student'])->name('free-choose-is_student');

Route::post('/free/choose/medicate', [TestController::class, 'medicate'])->name('free-choose-medicate');

Route::group([], function () {
    Route::prefix('auth')->name('auth.')->group(base_path('routes/web/auth.php'));
});
Route::group([], function () {
    Route::name('')->group(base_path('routes/web/user.php'));
});
Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
    $locale = app()->getLocale();
    Route::get('admin-change-locale/{locale}', [LanguageController::class, 'changeLocale'])->name('admin-change-locale');
    Route::prefix("$locale/admin")->name('admin.')->group(base_path('routes/web/admin.php'));
});
Route::fallback(function () {
    return redirect('/');
});