<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ProcuradorController;
use App\Http\Controllers\AbogadoExpedienteController;


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
Route::resource('abogados',AbogadoController::class);
Route::resource('procuradores',ProcuradorController::class);
Route::resource('abogadoexpedientes',AbogadoExpedienteController::class);
Route::get('expedientes/show/{expediente}',[DocumentoController::class,'index2'])->name('expedientes.docs');
Route::get('expedientes/create2/{expediente}',[AbogadoExpedienteController::class,'create2'])->name('expedientes.create2');
