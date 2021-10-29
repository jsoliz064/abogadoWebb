<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ProcuradorController;
use App\Http\Controllers\AbogadoExpedienteController;
use App\Http\Controllers\ProcuradorExpedienteController;


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
Route::resource('abogados',AbogadoController::class);
Route::resource('procuradors',ProcuradorController::class);

Route::resource('expedientes',ExpedienteController::class);
Route::get('expedientes/abogados/show/{expediente}',[ExpedienteController::class,'showAbogados'])->name('expedientes.abogados');
Route::get('expedientes/procuradores/show/{expediente}',[ExpedienteController::class,'showProcuradores'])->name('expedientes.procuradors');
Route::get('expedientes/documentos/show/{expediente}',[ExpedienteController::class,'showDocumentos'])->name('expedientes.documentos');


Route::resource('documentos',DocumentoController::class);
Route::get('expedientes/show/{expediente}',[DocumentoController::class,'index2'])->name('expedientes.docs');
Route::delete('expedientes/documentos/destroy/{expediente}',[DocumentoController::class,'destroyDocumentoExpediente'])->name('expedientes.destroydocumento');


Route::resource('abogadoexpedientes',AbogadoExpedienteController::class);
Route::get('expedientes/create2/{expediente}',[AbogadoExpedienteController::class,'create2'])->name('expedientes.create2');
Route::post('expedientes/abogados/store/{expediente}',[AbogadoExpedienteController::class,'storeAbogadoExpediente'])->name('expedientesAbogados.store');
Route::delete('expedientes/abogados/destroy/{expediente}',[AbogadoExpedienteController::class,'destroyAbogadoExpediente'])->name('expedientes.destroyabogado');


Route::resource('procuradorexpedientes',ProcuradorExpedienteController::class);
Route::post('expedientes/procuradores/store/{expediente}',[ProcuradorExpedienteController::class,'storeProcuradorExpediente'])->name('expedientesProcuradors.store');
Route::delete('expedientes/procuradores/destroy/{expediente}',[ProcuradorExpedienteController::class,'destroyProcuradorExpediente'])->name('expedientes.destroyprocurador');
