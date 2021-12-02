<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HandlerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherController;
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
Auth::routes();
Route::post('/sendVerificationCode', [\App\Http\Controllers\Auth\RegisterController::class, 'sendVerificationCode'])->name('send.verification.code');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/question', QuestionController::class);
    Route::post('/buyStar', [\App\Http\Controllers\PaymentController::class, 'buyStar'])->name('buy.star');
    Route::any('/callBackPayment', [\App\Http\Controllers\PaymentController::class, 'callBackPayment'])->name('call.back.payment');

    Route::group(['middleware' => 'is.teacher'], function () {
        Route::resource('/teacher', TeacherController::class);
        Route::post('/accept', [HandlerController::class, 'accept'])->name('accept');
        Route::resource('/answer', AnswerController::class);
    });


    Route::group(['middleware' => 'is.admin'], function () {
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
        Route::post('/approveQuestionByAdmin', [\App\Http\Controllers\AdminController::class, 'approved'])->name('approved.by.admin');
        Route::post('/promptToTeacher', [HandlerController::class, 'promptToTeacher'])->name('prompt.to.teacher');
    });
});
