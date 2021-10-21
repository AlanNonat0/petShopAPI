<?php

use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * AnimalTypes endpoints
 */
Route::prefix('type')->group(function () {
    Route::post('new', [AnimalTypeController::class, 'store']);
    Route::get('list', [AnimalTypeController::class, 'index']);
    Route::get('find/{id}', [AnimalTypeController::class, 'find']);
    Route::put('update/{id}', [AnimalTypeController::class, 'update']);
    Route::patch('update/{id}', [AnimalTypeController::class, 'update']);
    Route::delete('delete/{id}', [AnimalTypeController::class, 'destroy']);
});


/**
 * Owner endpoints
 */
Route::prefix('owner')->group(function () {

    Route::post('new', [OwnerController::class, 'store']);
    Route::get('list', [OwnerController::class, 'index']);
    Route::get('find/{id}', [OwnerController::class, 'find']);
    Route::put('update/{id}', [OwnerController::class, 'update']);
    Route::patch('update/{id}', [OwnerController::class, 'update']);
    Route::delete('delete/{id}', [OwnerController::class, 'destroy']);
});


/**
 * Pet endpoints
 */
Route::prefix('pet')->group(function () {
    Route::post('new', [PetController::class, 'store']);
    Route::get('find/{id}', [PetController::class, 'find']);
    Route::get('list', [PetController::class, 'index']);
    Route::patch('update/{id}', [PetController::class, 'update']);
    Route::put('update/{id}', [PetController::class, 'update']);
    Route::delete('delete/{id}', [PetController::class, 'destroy']);
});
