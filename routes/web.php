<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'dashboard'])->middleware('AuthCheck');


Route::match(['POST','GET'],'/login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);

//login and registration
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('login', [UserController::class, 'login']);
    route::get('register', [UserController::class, 'register']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('logout', [UserController::class, 'logout']);
});
