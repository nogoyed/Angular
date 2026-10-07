<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalController;

Route::apiResource('animals', AnimalController::class);
