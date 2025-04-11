<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\VerifyQuestionnaireCompletion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/login', function () {
    return view('Login');
})->name('login')->middleware('guest');

Route::get('/signup', function () {
    return view('Signup');
})->middleware('guest');

Route::get('/chat', function () {
    return view('Chat');
})->middleware('auth')->name('chat');

Route::get('/questionnaire', function () {
    return view('Questionnaire');
})->name('questionnaire')->middleware('auth')->middleware(VerifyQuestionnaireCompletion::class);

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/login', [AuthController::class, 'login'])->name('login');
