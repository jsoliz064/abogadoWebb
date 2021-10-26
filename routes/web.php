<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DocumentoController;


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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clientes',ClienteController::class);
Route::resource('expedientes',ExpedienteController::class);
Route::resource('documentos',DocumentoController::class);
Route::get('expedientes/show/{expediente}',[DocumentoController::class,'index2'])->name('expedientes.docs');
