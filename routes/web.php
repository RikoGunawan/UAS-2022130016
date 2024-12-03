<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PaymentController;

//Versi singkat
Route::resource('/', UserController::class);
Route::resource('users', UserController::class);
Route::resource('computers', ComputerController::class);
Route::resource('games', GameController::class);
Route::resource('pricings', PricingController::class);
Route::resource('sessions', SessionController::class);
Route::resource('payments', PaymentController::class);

