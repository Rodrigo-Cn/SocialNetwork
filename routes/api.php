<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:sanctum', 'checkUserBanned']);
    Route::post('logout', [AuthController::class, 'logout'])->withoutMiddleware(['auth:sanctum', 'checkUserBanned']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::post('feed', [PostController::class, 'storeFeedPost']);
        Route::post('community', [PostController::class, 'storeCommunityPost']);
        Route::put('feed', [PostController::class, 'updateFeedPost']);
        Route::put('community', [PostController::class, 'updateCommunityPost']);
        Route::delete('{id}', [PostController::class, 'destroy']);
        Route::get('{id}', [PostController::class, 'edit']);
    });
});

Route::prefix('users')->group(function () {
    Route::post('register', [UserController::class, 'register'])->withoutMiddleware(['auth:sanctum', 'checkUserBanned']);
    Route::put('update', [UserController::class, 'update']);
    Route::get('{id}', [UserController::class, 'show']);
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
