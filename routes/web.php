<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomServiceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityReservationController;
use App\Http\Controllers\Room2Controller;
use App\Http\Controllers\Service2Controller;
use App\Http\Controllers\Facility2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\UserTypeMiddleware;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'checkUserType']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->middleware(UserTypeMiddleware::class.':ADM')->name('admin.home');

    Route::resource('guests', GuestController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('rooms', RoomController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('reservations', ReservationController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('services', ServiceController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('service_reservations', ServiceReservationController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('payments', PaymentController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('employees', EmployeeController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('room_services', RoomServiceController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('facilities', FacilityController::class)->middleware(UserTypeMiddleware::class.':ADM');
    Route::resource('facility_reservations', FacilityReservationController::class)->middleware(UserTypeMiddleware::class.':ADM');

    Route::get('/home2', function () {
        return view('home2');
    })->middleware(UserTypeMiddleware::class.':USR')->name('user.home');

    Route::get('/room2', [Room2Controller::class, 'index'])->middleware(UserTypeMiddleware::class.':USR')->name('room2.index');
    Route::get('/room2/{room}', [Room2Controller::class, 'show'])->middleware(UserTypeMiddleware::class.':USR')->name('room2.show');

    Route::get('/service2', [Service2Controller::class, 'index'])->middleware(UserTypeMiddleware::class.':USR')->name('service2.index');
    Route::get('/service2/{service}', [Service2Controller::class, 'show'])->middleware(UserTypeMiddleware::class.':USR')->name('service2.show');

    Route::get('/facility2', [Facility2Controller::class, 'index'])->middleware(UserTypeMiddleware::class.':USR')->name('facility2.index');
    Route::get('/facility2/{facility}', [Facility2Controller::class, 'show'])->middleware(UserTypeMiddleware::class.':USR')->name('facility2.show');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/noaccess', function () {
    return view('noaccess');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
