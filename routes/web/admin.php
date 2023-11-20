<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

Route::resource('/menu', MenuController::class);
Route::resource('/category', CategoryController::class);