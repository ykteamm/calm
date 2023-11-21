<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;

Route::resource('/menu', MenuController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/language', LanguageController::class);