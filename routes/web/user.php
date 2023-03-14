<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::controller(UserController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('user.dashboard');
});