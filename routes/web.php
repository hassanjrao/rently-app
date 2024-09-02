<?php

use App\Http\Controllers\AdminBodyTypeController;
use App\Http\Controllers\AdminCarEngineController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDriveTypeController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminVehicleTypeController;
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


Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {

    Route::get('',[AdminDashboardController::class,'index'])->name('dashboard.index');

    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);


    Route::resource('body-types', AdminBodyTypeController::class)->except(['show']);

    Route::resource('vehicle-types', AdminVehicleTypeController::class)->except(['show']);

    Route::resource('car-engines', AdminCarEngineController::class)->except(['show']);

    Route::resource('drive-types', AdminDriveTypeController::class)->except(['show']);


});
