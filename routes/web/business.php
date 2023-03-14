<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Business\BusinessController;

Route::controller(BusinessController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('business.dashboard');
});

// Route::controller(DefaultController::class)->group(function() {
//     Route::get('/profiles', 'profiles')->name('business.profiles.profiles');
// });