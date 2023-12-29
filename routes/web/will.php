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
Route::put('/update-reward-feelings/{reward}', [WillController::class, 'updateRewardFelings'])->name('update-reward-feelings');
Route::resource('aim', AimController::class);
Route::get('reward-thanks/{reward}', [WillController::class, 'rewardThanks'])->name('reward.thanks');
Route::post('reward-image-upload/{reward}', [WillController::class, 'upload'])->name('reward-image-upload');
Route::post('reward-image-reupload/{reward}/{asset}', [WillController::class, 'reupload'])->name('reward-image-reupload');
Route::delete('reward-image-unupload/{reward}/{asset}', [WillController::class, 'unupload'])->name('reward-image-unupload');