<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function() {
    Route::get('/dashboard', 'IndexDashboard')->name('user.dashboard'); 
});