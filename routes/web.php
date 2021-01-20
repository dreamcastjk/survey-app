<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('questionnaire.')->prefix('questionnaires')->middleware(['auth'])->group(function () {
    Route::get('create', [QuestionnaireController::class, 'create'])->name('create');
    Route::post('', [QuestionnaireController::class, 'store'])->name('store');
    Route::get('{questionnaire}', [QuestionnaireController::class, 'show'])->name('show');
    Route::post('{questionnaire}/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('{questionnaire}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
});

Route::name('survey.')->prefix('surveys')->group(function () {
    Route::get('{questionnaire}-{slug}', [SurveyController::class, 'show'])->name('show');
    Route::post('{questionnaire}-{slug}', [SurveyController::class, 'store'])->name('store');
});


