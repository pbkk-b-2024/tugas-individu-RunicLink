<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GuestController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ServiceReservationController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\RoomServiceController;
use App\Http\Controllers\API\FacilityController;
use App\Http\Controllers\API\FacilityReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('guest', GuestController::class);
Route::apiResource('room', RoomController::class);
Route::apiResource('reservation', ReservationController::class);
Route::apiResource('service', ServiceController::class);
Route::apiResource('service_reservation', ServiceReservationController::class);
Route::apiResource('payment', PaymentController::class);
Route::apiResource('employee', EmployeeController::class);
Route::apiResource('room_service', RoomServiceController::class);
Route::apiResource('facility', FacilityController::class);
Route::apiResource('facility_reservation', FacilityReservationController::class);

