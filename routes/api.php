<?php

use App\Http\Controllers\Campaign\CampaignApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Campaign\StoreController;
use App\Http\Controllers\Campaign\IndexController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/createCampaign', StoreController::class);
});

Route::get('/getCampaigns', IndexController::class);
Route::get('/getCampaign', [CampaignApiController::class, 'getById']);
