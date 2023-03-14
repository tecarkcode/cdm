<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DefaultController;

Route::controller(AdminController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
});

Route::controller(DefaultController::class)->group(function() {
    Route::get('/profiles', 'profiles')->name('admin.profiles.profiles');

    Route::get('/subprofiles', 'subprofiles')->name('admin.profiles.subprofiles');
});