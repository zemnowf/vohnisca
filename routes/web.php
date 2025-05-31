<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Campaign\CampaignController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [LoginController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('register', [LoginController::class, 'completeRegister'])->name('completeRegister');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('campaigns/{id?}', [CampaignController::class, 'show'])->name('campaigns.show');


