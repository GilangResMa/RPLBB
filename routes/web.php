<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\CustomerController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

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
// Registration routes
Route::get('/register', [CustomerController::class, 'showRegisterForm'])->name('register');
Route::post('/custregister', [CustomerController::class, 'register'])->name('custregister');

// Login routes
Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('login');
Route::post('/custlogin', [CustomerController::class, 'authenticate'])->name('custlogin');

Route::get('/profile', [CustomerController::class, 'showProfile'])->name('profile');
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
