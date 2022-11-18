<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'indexAction']);



Route::get('/positions', [\App\Http\Controllers\PositionsController::class, 'indexAction']);



Route::get('/token', [\App\Http\Controllers\TokenController::class, 'indexAction']);



Route::get('/user/{id}', [\App\Http\Controllers\UserIdController::class, 'indexAction']);



Route::get('/user', [\App\Http\Controllers\UserController::class, 'indexAction']);



Route::post('/user', [\App\Http\Controllers\UserController::class, 'newUserAction']);
