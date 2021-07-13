<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

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
    return view('admin/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Here is quiz

Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz-create');
Route::post('/quiz/create', [QuizController::class, 'store'])->name('quiz-store');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz-index');

Route::delete('/quiz/{id}', [QuizController::class, 'destroy'])->name('quiz-delete');

Route::get('/quiz/edit/{id}', [QuizController::class, 'edit'])->name('quiz-edit');

Route::put('/quiz/edit/{id}', [QuizController::class, 'update'])->name('quiz-update');


// Here end quiz
