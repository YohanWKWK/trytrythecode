<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


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
Route::get('logout', [AuthController::class, 'logout']); // belum ada
Route::get('register', [AuthController::class, 'register_form']); // belum ada
Route::post('register', [AuthController::class, 'register']); // belum ada
Route::get('profile/{id}', [UserController::class, 'view']); // belum ada

Route::get('dashboard', [DasboardController::class, 'index']);

Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{category}', [ProductController::class, 'view']); // ketika
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::patch('products/{id}', [ProductController::class, 'update']);
Route::get('products/{category}/{slug}', [ProductController::class, 'show']);
