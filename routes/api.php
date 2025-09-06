<?php

use App\Http\Controllers\Api\IoTDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// IoTデータのAPIルート
Route::apiResource('iot-data', IoTDataController::class);
