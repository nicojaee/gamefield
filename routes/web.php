<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/post-login', [AuthController::class, 'login']);
Route::post('/post-register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);