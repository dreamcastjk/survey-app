<?php

use App\Http\Controllers\QuestionnaireController;
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

Route::prefix('questionnaires')->middleware(['auth'])->group(function () {
    Route::get('create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::post('', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
});



