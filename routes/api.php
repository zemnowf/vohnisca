<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Campaign\StoreController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/create-campaign', StoreController::class);
});
