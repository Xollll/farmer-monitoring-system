<?php

use App\Http\Controllers\HomeController; //controllers file in app folder
use Illuminate\Support\Facades\Route;

Route::post('/moisture', [HomeController::class, 'storeMoistureData']);