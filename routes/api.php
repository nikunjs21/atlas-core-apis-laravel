<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:60,1')->group(function () {
	Route::post('register', [UserController::class, 'register']);
	Route::post('login', [AuthController::class, 'login']);
	Route::middleware(JwtMiddleware::class)->group(function () {
		Route::get('me', [UserController::class, 'me']);
		Route::get('logout', [AuthController::class, 'logout']);
		Route::post('refresh', [AuthController::class, 'refresh']);

		Route::post('workspace', [WorkspaceController::class, 'create']);
		Route::post('task', [TaskController::class, 'create'])
			->middleware('permission:task,create');
	});
});
