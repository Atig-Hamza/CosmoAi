<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/login', function () {
    return view('Login');
});

Route::get('/signup', function () {
    return view('Signup');
});

Route::get('/chat', function () {
    return view('Chat');
});

Route::get('/questionnaire', function () {
    return view('Questionnaire');
});