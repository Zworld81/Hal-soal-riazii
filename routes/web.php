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
Route::post('/sendVerificationCode', [\App\Http\Controllers\Auth\AuthSmsController::class, 'sendVerificationCode'])->name('send.verification.code');
Route::post('/checkVerificationCode', [\App\Http\Controllers\Auth\AuthSmsController::class, 'checkVerificationCode'])->name('check.verification.code');
Route::post('/changePassword', [\App\Http\Controllers\Auth\AuthSmsController::class, 'changePassword'])->name('change.password');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/question', QuestionController::class);
    Route::post('/buyStar', [\App\Http\Controllers\PaymentController::class, 'buyStar'])->name('buy.star');
    Route::any('/callBackPayment', [\App\Http\Controllers\PaymentController::class, 'callBackPayment'])->name('call.back.payment');
    Route::post('/getReferralCode', [\App\Http\Controllers\HandlerController::class, 'getReferralCode'])->name('get.referral.code');
    Route::post('/updateProfile', [\App\Http\Controllers\HandlerController::class, 'updateProfile'])->name('update.profile');


    Route::group(['middleware' => 'is.teacher'], function () {
        Route::resource('/teacher', TeacherController::class);
        Route::post('/accept', [HandlerController::class, 'accept'])->name('accept');
        Route::resource('/answer', AnswerController::class);
    });


    Route::group(['middleware' => 'is.admin', 'prefix' => 'admin'], function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'home'])->name('admin.index');
        Route::get('/userManagement', [\App\Http\Controllers\AdminController::class, 'index'])->name('user.management');
        Route::get('/changeLevel', [HandlerController::class, 'changeLevel'])->name('change.level');

        Route::get('/confirmAnswer', [\App\Http\Controllers\AdminController::class, 'confirmAnswer'])->name('confirm.answer');
        Route::get('/approveQuestionByAdmin', [\App\Http\Controllers\AdminController::class, 'approved'])->name('approved.by.admin');

        Route::get('/payment', [\App\Http\Controllers\AdminController::class, 'payment'])->name('payment.index');
        Route::get('/payToUser', [\App\Http\Controllers\AdminController::class, 'payToUser'])->name('pay.to.user.index');

        Route::get('/payedConfirm', [\App\Http\Controllers\AdminController::class, 'payedConfirm'])->name('payed.confirm.index');

    });
});
