<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Investor\InvestorController;

Route::controller(InvestorController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('investor.dashboard');
});

// Route::controller(DefaultController::class)->group(function() {
//     Route::get('/profiles', 'profiles')->name('investor.profiles.profiles');
// });