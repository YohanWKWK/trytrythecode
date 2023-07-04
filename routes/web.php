<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


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

    $id = Auth::id();
    $user = User::where('id', $id)->first();
    // dd($user);

    $view_data = [
        'user' => $user,
    ];

    return view('welcome', $view_data);
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
Route::get('products/{category}', [ProductController::class, 'view']); // ketika
Route::get('products/{category}/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{category}/{slug}/edit', [ProductController::class, 'edit']);
Route::patch('products/{category}/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('order/{productId}', [OrderController::class, 'showOrderForm'])->name('order.form');
