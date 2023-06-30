<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirTawarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);


Route::get('dashboard', [DasboardController::class, 'index']);
Route::get('product/air-tawar', [AirTawarController::class, 'index']);
