<?php

use App\Http\Controllers\TransportationController;
use App\Http\Controllers\ProductionCapacityController;
use App\Http\Controllers\RawMaterialsController;
use App\Http\Controllers\WorkForceController;
use App\Http\Controllers\UserController;
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



Route::post(('register'), [UserController::class, 'register']);
Route::post(('login'), [UserController::class, 'login']);

//transportation
Route::post(('storetransportation'), [TransportationController::class, 'store']);
Route::get(('gettransportation'), [TransportationController::class, 'index']);

//production capacity
Route::get(('getproduction'), [ProductionCapacityController::class, 'index']);
Route::post(('storeproduction'), [ProductionCapacityController::class, 'store']);

//rawmaterials
Route::get(('getrawmaterials'), [RawMaterialsController::class, 'index']);
Route::post(('storerawmaterials'), [RawMaterialsController::class, 'store']);

//workforce
Route::get(('getworkforce'), [WorkForceController::class, 'index']);
Route::post(('storeworkforce'), [WorkForceController::class, 'store']);
