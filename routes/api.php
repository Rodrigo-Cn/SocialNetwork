<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\MaritalStatusController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('maritalstatus/', MaritalStatusController::class)->only(['index', 'show']);

Route::apiResource('genders/', GenderController::class)->only(['index', 'show']);

Route::apiResource('categories/', Category::class)->only(['index', 'show']);
