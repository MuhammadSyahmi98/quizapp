<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

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



Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'isAdmin'], function(){
    Route::get('/', function () {
        return view('admin/index');
    });
    // Here is quiz

    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz-create');
    Route::post('/quiz/create', [QuizController::class, 'store'])->name('quiz-store');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz-index');
    Route::delete('/quiz/{id}', [QuizController::class, 'destroy'])->name('quiz-delete');
    Route::get('/quiz/edit/{id}', [QuizController::class, 'edit'])->name('quiz-edit');
    Route::put('/quiz/edit/{id}', [QuizController::class, 'update'])->name('quiz-update');

    Route::get('/quiz/question/{id}', [QuizController::class, 'question'])->name('quiz-question');

    // End quiz

    // =================================================================================================

    // Here is question

    Route::get('/question/create', [QuestionController::class, 'create'])->name('question-create');
    Route::get('/question', [QuestionController::class, 'index'])->name('question-index');

    Route::delete('/question/{id}', [QuestionController::class, 'destroy'])->name('question-delete');

    Route::get('/question/show/{id}', [QuestionController::class, 'show'])->name('question-show');

    Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('question-edit');
    Route::put('/question/edit/{id}', [QuestionController::class, 'update'])->name('question-update');

    Route::post('/question/create', [QuestionController::class, 'store'])->name('question-store');

    // End question

    // =================================================================================================


    // =================================================================================================

    // Here is User

    Route::get('/user', [UserController::class, 'index'])->name('user-index');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user-destroy');
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user-store');

    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user-update');


    // End User

    // =================================================================================================

    // =================================================================================================

    // Here is Exam

    Route::get('/exam/assign', [ExamController::class, 'create'])->name('exam-create');
    Route::post('/exam/assign', [ExamController::class, 'store'])->name('exam-store');
    Route::get('/exam/user', [ExamController::class, 'index'])->name('exam-index');
    Route::post('/exam/user', [ExamController::class, 'removeAssign'])->name('exam-destroy');

    // End Exam

    // =================================================================================================

});

