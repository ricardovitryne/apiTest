<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

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
Route::get('cliente', [CustomerController::class, 'index']);
Route::get('cliente/{customer}', [CustomerController::class, 'show']);
Route::post('cliente', [CustomerController::class, 'store']);
Route::put('cliente/{customer}', [CustomerController::class, 'update']);
Route::delete('cliente/{customer}', [CustomerController::class, 'destroy']);
Route::get('consulta/final-placa/{numero}', [CustomerController::class, 'searchCarPlate']);

