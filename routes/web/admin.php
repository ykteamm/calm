<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmojiController;
use App\Http\Controllers\GratitudeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\LandscapeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\MeditatorController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SteroidController;
use App\Http\Controllers\SteroidinfoController;
use App\Http\Controllers\TestController;


Route::resource('category', CategoryController::class);
Route::resource('language', LanguageController::class);
Route::resource('meditator', MeditatorController::class);
Route::post('meditator-upload/{meditator}', [MeditatorController::class, 'upload'])->name('meditator-upload');
Route::post('meditator-reupload/{meditator}/{asset}', [MeditatorController::class, 'reupload'])->name('meditator-reupload');
Route::delete('meditator-unupload/{meditator}/{asset}', [MeditatorController::class, 'unupload'])->name('meditator-unupload');
Route::get('meditator-avatar/{meditator}', [MeditatorController::class, 'avatar'])->name('meditator-avatar-view');
Route::get('meditator-image/{meditator}', [MeditatorController::class, 'image'])->name('meditator-image-view');
Route::resource('meditation', MeditationController::class);
Route::resource('lesson', LessonController::class);
Route::get('lesson-audio-upload/{lesson}', [LessonController::class, 'audioCreate'])->name('lesson-audio-upload-view');
Route::post('lesson-audio-upload/{lesson}', [LessonController::class, 'audioStore'])->name('lesson-audio-upload');
Route::post('lesson-audio-update/{lesson}/{audio}', [LessonController::class, 'audioUpdate'])->name('lesson-audio-update');
Route::get('lesson-audio-update/{lesson}/{audio}', [LessonController::class, 'audioEdit'])->name('lesson-audio-update-view');
Route::get('lesson-audio-download/{lesson}/{audio}', [LessonController::class, 'audioDownload'])->name('lesson-audio-download');
Route::delete('lesson-audio-delete/{lesson}/{audio}', [LessonController::class, 'audioDelete'])->name('lesson-audio-delete');
Route::resource('motivation', MotivationController::class);
Route::resource('gratitude', GratitudeController::class);
Route::resource('issue', IssueController::class);
Route::post('issue-upload/{issue}', [IssueController::class, 'upload'])->name('issue-upload');
Route::post('issue-reupload/{issue}/{asset}', [IssueController::class, 'reupload'])->name('issue-reupload');
Route::delete('issue-unupload/{issue}/{asset}', [IssueController::class, 'unupload'])->name('issue-unupload');
Route::get('issue-image/{issue}', [IssueController::class, 'image'])->name('issue-image-view');
Route::resource('question', QuestionController::class);
Route::resource('variant', VariantController::class);
Route::resource('emoji', EmojiController::class);
Route::post('emoji-upload/{emoji}', [EmojiController::class, 'upload'])->name('emoji-upload');
Route::post('emoji-reupload/{emoji}/{asset}', [EmojiController::class, 'reupload'])->name('emoji-reupload');
Route::delete('emoji-unupload/{emoji}/{asset}', [EmojiController::class, 'unupload'])->name('emoji-unupload');
Route::get('emoji-image/{emoji}', [EmojiController::class, 'image'])->name('emoji-image-view');
Route::resource('landscape', LandscapeController::class);
Route::post('landscape-upload/{landscape}', [LandscapeController::class, 'upload'])->name('landscape-upload');
Route::post('landscape-reupload/{landscape}/{asset}', [LandscapeController::class, 'reupload'])->name('landscape-reupload');
Route::delete('landscape-unupload/{landscape}/{asset}', [LandscapeController::class, 'unupload'])->name('landscape-unupload');
Route::get('landscape-image/{landscape}', [LandscapeController::class, 'image'])->name('landscape-image-view');
Route::get('landscape-video/{landscape}', [LandscapeController::class, 'video'])->name('landscape-video-view');
Route::get('landscape-audio/{landscape}', [LandscapeController::class, 'audio'])->name('landscape-audio-view');
Route::resource('medicine', MedicineController::class);
Route::resource('package', PackageController::class);
Route::get('package-image/{package}', [PackageController::class, 'image'])->name('package-image-view');
Route::post('package-image-upload/{package}', [PackageController::class, 'upload'])->name('package-image-upload');
Route::post('package-image-reupload/{package}/{asset}', [PackageController::class, 'reupload'])->name('package-image-reupload');
Route::delete('package-image-unupload/{package}/{asset}', [PackageController::class, 'unupload'])->name('package-image-unupload');
Route::resource('test', TestController::class);
Route::resource('answer', AnswerController::class);
Route::resource('steroid', SteroidController::class);
Route::resource('steroidinfo', SteroidinfoController::class);
