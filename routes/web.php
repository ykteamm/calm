<?php

use App\Http\Controllers\LandscapeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(base_path('routes/web/auth.php'));

Route::get('change-locale/{locale}', [LanguageController::class, 'changeLocale'])->name('change-locale');


Route::post('landscape-save-session', [LandscapeController::class, 'landscapeSaveSession'])->name('landscape-save-session');

Route::prefix(langPrefix())->group(function() {

    Route::group([], base_path('routes/web/quiz.php'));

    Route::group([], base_path('routes/web/user.php'));

    Route::group([], base_path('routes/web/will.php'));

    Route::group([], base_path('routes/web/main.php'));

    Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
        Route::prefix("admin")->name('admin.')->group(base_path('routes/web/admin.php'));
    });
});
