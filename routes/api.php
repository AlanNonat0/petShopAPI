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
Route::post('type/new', [AnimalTypeController::class, 'store']);
Route::get('type/list', [AnimalTypeController::class, 'index']);
Route::get('type/find/{id}', [AnimalTypeController::class, 'find']);
Route::delete('type/delete/{id}', [AnimalTypeController::class, 'destroy']);

/**
 * Owner endpoints
 */
Route::post('owner/new', [OwnerController::class, 'store']);
Route::get('owner/list', [OwnerController::class, 'index']);
Route::get('owner/find/{id}', [OwnerController::class, 'find']);
Route::delete('owner/delete/{id}', [OwnerController::class, 'destroy']);

/**
 * Pet endpoints
 */
Route::post('pet/new', [PetController::class, 'store']);
Route::get('pet/find/{id}', [PetController::class, 'find']);
Route::get('pet/list', [PetController::class, 'index']);
Route::put('pet/update/{id}', [PetController::class, 'update']);
Route::delete('pet/delete/{id}', [PetController::class, 'destroy']);
