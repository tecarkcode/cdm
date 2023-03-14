<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(LoginController::class)->group(function () {
    Route::get('logout', 'logout'); 
});

Route::get('/', ['middleware' => 'guest', function () {
    return view('auth.login');
}]);

Route::controller(PaymentController::class)->group(function () {
    Route::get('payment', 'payment'); 
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('payment', 'payment'); 
});

Route::prefix('admin')->middleware(['auth'])->group(base_path('routes/web/admin.php'));
Route::prefix('user')->middleware(['auth'])->group(base_path('routes/web/user.php'));
Route::prefix('investor')->middleware(['auth'])->group(base_path('routes/web/investor.php'));
Route::prefix('business')->middleware(['auth'])->group(base_path('routes/web/business.php'));