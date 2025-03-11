<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [LoginController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('register', [LoginController::class, 'completeRegister'])->name('completeRegister');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
