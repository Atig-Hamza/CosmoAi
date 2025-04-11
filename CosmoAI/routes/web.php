<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/login', function () {
    return view('Login');
})->name('login');

Route::get('/signup', function () {
    return view('Signup');
});

Route::get('/chat', function () {
    return view('Chat');
})->middleware('auth');

Route::get('/questionnaire', function () {
    return view('Questionnaire');
})->name('questionnaire');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
