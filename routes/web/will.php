<?php

use App\Http\Controllers\AimController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WillController;
use Illuminate\Support\Facades\Route;



Route::get('/will', [WillController::class, 'index'])->name('will.index');
Route::post('/save-aims', [WillController::class, 'saveAims'])->name('save-aims');
Route::post('/save-rewards', [WillController::class, 'saveRewards'])->name('save-rewards');
Route::resource('aim', AimController::class);
