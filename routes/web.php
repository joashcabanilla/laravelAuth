<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\crudController;
use App\Http\Controllers\importExportController;

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
Route::get("edit/{id}",[crudController::class,'editUserData']);
Route::put('updateUser/{id}',[crudController::class, 'userUpdateData']);
Route::get("delete/{id}",[crudController::class,'deleteUserData']);
Route::get('user/import',[importExportController::class,'importForm']);
Route::post('importUser',[importExportController::class,'importUser'])->name('user.import');
Route::get('user/exportExcel',[importExportController::class,'exportExcel']);
Route::get('user/exportCSV',[importExportController::class,'exportCSV']);
Route::get('user/exportPDF',[importExportController::class,'exportPDFview']);
Route::get('user/savePDF',[importExportController::class,'savePDF']);
Route::get('user/PDF',[importExportController::class,'PDF']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
