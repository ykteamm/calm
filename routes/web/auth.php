<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
Route::post('sms-verify', [AuthController::class, 'smsVerify'])->name('sms-verify');
Route::get('sms-verify', [AuthController::class, 'smsVerifyView'])->name('sms-verify-view');
Route::get('change-password', [AuthController::class, 'changePasswordView'])->name('change-password-view');
Route::post('change-password', [AuthController::class, 'changePassword'])->name('change-password');
Route::get('forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgot-password-view');
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
