<?php

use App\Http\Controllers\IoTDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iot-data', [IoTDataController::class, 'index'])->name('iot-data.index');
