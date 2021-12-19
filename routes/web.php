<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Services;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'save_user']);
Route::post('/login', [UserController::class, 'login_user']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/', function () {return view('intro'); })->middleware('auth');
Route::get('/graphs', function(){return view('new_graph'); })->middleware('auth');
Route::get('/select_graphs', [GraphController::class, 'index'])->middleware('auth');
Route::get('/price', [PriceController::class, 'index'])->middleware('auth');
Route::get('/price/{graph}', [PriceController::class, 'indexGraph'])->middleware('auth');
Route::get('/add_price', [PriceController::class, 'create'])->middleware('auth');
Route::get('/search', [PriceController::class, 'search'])->middleware('auth');
Route::get('/select_users', [UserController::class, 'control'])->middleware('auth');

/**
 * 
 * 
 * 
 */