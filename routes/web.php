<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('main');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [LoginController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('register', [LoginController::class, 'completeRegister'])->name('completeRegister');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
