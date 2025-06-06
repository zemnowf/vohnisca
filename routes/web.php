<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Campaign\CampaignController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    return view('test');
});

Auth::routes();

//main
Route::get('/home', [HomeController::class, 'index'])->name('home');

//campaigns
Route::get('/getCampaigns', [CampaignController::class, 'getCampaigns'])->name('getCampaigns');
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{id?}', [CampaignController::class, 'show'])->name('campaigns.show');
Route::get('/create-campaign', [CampaignController::class, 'showCreateNewCampaign'])
    ->name('campaigns.create')
    ->middleware('auth');
Route::post('/create-campaign', [CampaignController::class, 'createNewCampaign'])
    ->name('campaigns.store')
    ->middleware('auth');
