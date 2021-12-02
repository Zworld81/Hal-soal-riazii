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

Route::resource('/question', QuestionController::class);
Route::resource('/teacher', TeacherController::class);

Route::post('/accept', [HandlerController::class, 'accept'])->name('accept');
Route::resource('/answer', AnswerController::class);

Route::get('/admin',function() {
    return view('admin');
});

