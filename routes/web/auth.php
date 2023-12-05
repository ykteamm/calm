<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
