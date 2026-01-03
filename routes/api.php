<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:60,1')->group(function () {
	// Route::middleware('auth:api')->group(function () {});
	Route::post('register', [UserController::class, 'register']);
});
