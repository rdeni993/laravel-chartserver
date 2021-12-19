<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesGraphApi;
use App\Http\Controllers\ServicesPriceApi;
use App\Http\Controllers\ChartApi;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * 
 * ------------------------------------------------------------------------
 * API Graphs
 * ------------------------------------------------------------------------
 * 
 */

Route::get('/graph', [ServicesGraphApi::class, 'select']);
Route::post('/graph', [ServicesGraphApi::class, 'create']);
Route::delete('/graph', [ServicesGraphApi::class, 'delete']);

Route::post('/price', [ServicesPriceApi::class, 'create']);
Route::put('/price', [ServicesPriceApi::class, 'update']);
Route::get('/price/{date}/{chart}', [ServicesPriceApi::class, 'search']);
Route::get('/users/{user}', [UserController::class, 'approve']);

/**
 * 
 * Outbox Api
 * 
 */

Route::get('/chart/{chart}', [ChartApi::class, 'get']);
Route::get('/chart/{chart}/{from}/{to}', [ChartApi::class, 'getWhere']);
Route::get('/chart/api/script', function(){
    return response()->file('js/chartjs-dr.js');
});