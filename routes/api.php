<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MaritalStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('register/', [AuthController::class, 'register']);
    Route::post('login/', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::apiResource('maritalstatus', MaritalStatusController::class)
    ->only(['index', 'show'])
    ->names('maritalstatus');

Route::apiResource('genders', GenderController::class)
    ->only(['index', 'show'])
    ->names('genders');

Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show'])
    ->names('categories');

