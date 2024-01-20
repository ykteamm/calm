<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function () {
    /**
     * @var \App\Services\CalculateQuizService
     */
    $calculate = resolve(\App\Services\CalculateQuizService::class);
    $answers = require_once resource_path('answers.php');
    $result = $calculate->result($answers);
    dd($result);
    return $result;
});