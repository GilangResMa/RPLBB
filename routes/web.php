<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/detailkamar', function () {
    return view('detailkamar');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::post('/api/process-payment', [PaymentController::class, 'processPayment']);
Route::post('/midtrans/notification', [PaymentController::class, 'handleNotification']);
Route::post('/create-payment', [PaymentController::class, 'createPayment']);