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
Route::get('user/import',[HomeController::class,'importForm']);
Route::post('importUser',[HomeController::class,'importUser'])->name('user.import');
Route::get('user/exportExcel',[HomeController::class,'exportExcel']);
Route::get('user/exportCSV',[HomeController::class,'exportCSV']);
Route::get('user/exportPDF',[HomeController::class,'exportPDFview']);
Route::get('user/savePDF',[HomeController::class,'savePDF']);
Route::get('user/PDF',[HomeController::class,'PDF']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
