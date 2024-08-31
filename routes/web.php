<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('cars', CarController::class)->only(['index', 'show']);


Route::middleware(['auth'])->group(function () {

    Route::post('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/dashboard', [UserProfileController::class, 'dashboard'])->name('profile.dashboard');
});
