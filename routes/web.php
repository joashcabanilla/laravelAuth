<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::view('/','welcome');
Route::get("edit/{id}",[HomeController::class,'editUserData']);
Route::put('updateUser/{id}',[HomeController::class, 'userUpdateData']);
Route::get("delete/{id}",[HomeController::class,'deleteUserData']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
