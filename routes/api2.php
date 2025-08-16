<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/home', function () {
    return view('welcome');
});
Route::post('/login', [AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/update/{user}', [UserController::class, 'update']);
    Route::delete('/destroy/{user}', [UserController::class, 'destroy']);
    Route::get('/show/{user}', [UserController::class, 'show']);
//});

