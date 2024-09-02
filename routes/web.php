<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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


Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');

Route::resource('cars', CarController::class)->only(['index', 'show']);

Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');

Route::post('bookings/quick', [BookingController::class, 'quickStore'])->name('bookings.quick.store');
Route::get('bookings/quick', [BookingController::class, 'quickBooking'])->name('bookings.quick');

Route::resource('news', NewsController::class)->only(['index', 'show']);

Route::resource('contact-us', ContactUsController::class)->only(['index', 'store']);

Route::middleware(['auth'])->group(function () {

    Route::post('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/dashboard', [UserProfileController::class, 'dashboard'])->name('profile.dashboard');
});
