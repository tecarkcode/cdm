<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::prefix('users')->middleware(['auth'])->group(base_path('routes/web/user.php'));