<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportCandidatesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isSupport;
use App\Http\Middleware\VerifyQuestionnaireCompletion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/apply-support', function () {
    return view('ApplySupport');
});

Route::get('/login', function () {
    return view('Login');
})->name('login')->middleware('guest');

Route::get('/signup', function () {
    return view('Signup');
})->middleware('guest');

Route::get('/chat', function () {
    return view('User/Chat');
})->middleware('auth')->name('chat');

Route::get('/questionnaire', function () {
    return view('User/Questionnaire');
})->name('questionnaire')->middleware('auth')->middleware(VerifyQuestionnaireCompletion::class);

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/que_complete', [QuestionnaireController::class, 'store'])->name('que_complete');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');

Route::get('/google/callback', [GoogleAuthController::class, 'Callback'])->name('google.callback');

Route::get('/voice', function () {
    return view('User/Voice');
})->name('voice')->middleware('auth');

Route::get('/admin-dash', function () {
    return view('Admin/Dash');
})->name('admin-dash')->middleware(isAdmin::class);

Route::get('/Tickets', function () {
    return view('Support/Dash');
})->name('Tickets')->middleware(isSupport::class);

Route::get('/user-management', function () {
    return view('Admin/User');
})->name('user-management')->middleware(isAdmin::class);

Route::post('/send-support-candidate', [SupportCandidatesController::class, 'sendSupportCandidate'])->name('send-support-candidate');

Route::get('/candidates-management', function () {
    return view('Admin/Support');
})->name('candidates-management')->middleware(isAdmin::class);

Route::get('/approve/{candidate}', [SupportCandidatesController::class, 'acceptSupportCandidate'])->middleware(isAdmin::class);

Route::get('/rejected/{candidate}', [SupportCandidatesController::class, 'rejectSupportCandidate'])->middleware(isAdmin::class);

Route::get('/support', function () {
    return view('User/Support');
})->name('support')->middleware('auth');

Route::post('/support', [TicketsController::class, 'openTicket'])->middleware('auth');

Route::post('/response/{ticket}', [TicketsController::class, 'responseTicket'])->middleware(isSupport::class);

Route::post('/createuser', [AuthController::class, 'createUser'])->middleware(isAdmin::class);

Route::post('/deleteuser/{user}', [UserController::class, 'deleteUser'])->middleware(isAdmin::class);

Route::get('suportboard', function () {
    return view('Support/Board');
})->name('suportboard')->middleware(isSupport::class);

Route::get('/settings', function () {
    return view('User/Settings');
})->name('settings')->middleware('auth');

Route::get('/plan', function () {
    return view('User/Plan');
})->name('plan')->middleware('auth');

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');

Route::get('/cancel', function () {
    return "Payment Canceled!";
})->name('payment.cancel');

Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');