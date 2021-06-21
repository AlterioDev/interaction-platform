<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('locations', [LocationController::class, 'index']);
    Route::get('location/{id}', [LocationController::class, 'show']);
    Route::post('location/create', [LocationController::class, 'create']);
    Route::post('location/update/{id}', [LocationController::class, 'update']);
    Route::get('location/delete/{id}', [LocationController::class, 'delete']);

    Route::get('devices', [DeviceController::class, 'index']);
    Route::get('device/{id}', [DeviceController::class, 'show']);
    Route::post('device/create', [DeviceController::class, 'create']);
    Route::post('device/update/{id}', [DeviceController::class, 'update']);
    Route::get('device/delete/{id}', [DeviceController::class, 'delete']);
});
