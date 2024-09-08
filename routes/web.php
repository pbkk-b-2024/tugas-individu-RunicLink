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

Route::get('/', function () {
    return view('home');
});

Route::resource('guests', GuestController::class);

Route::resource('rooms', RoomController::class);

Route::resource('reservations', ReservationController::class);

Route::resource('services', ServiceController::class);

Route::resource('service_reservations', ServiceReservationController::class);

Route::resource('payments', PaymentController::class);

Route::resource('employees', EmployeeController::class);

Route::resource('room_services', RoomServiceController::class);

Route::resource('facilities', FacilityController::class);

Route::resource('facility_reservations', FacilityReservationController::class);
