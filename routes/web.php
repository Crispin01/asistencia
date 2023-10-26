<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alumnosController;
use App\Http\Controllers\profesoresController;
use App\Http\Controllers\consultaDNIController;

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

Route::get('/home', function () {
    return view('inicio.home');
});

Route::get( '/', function () {
  return view('layouts.app');
});

Route::get( '/dni', function () {
   return view('consultas.dni');
 });

// Route::get( '/alumnos', [ alumnosController::class, 'index' ] )->name('alumnos.index');
// Route::post( '/alumnos', [ alumnosController::class, 'store' ] )->name('alumnos.store');
// Route::put( '/alumnos', [ alumnosController::class, 'update' ] )->name('alumnos.update');

Route::resource('alumnos', alumnosController::class);

Route::resource('profesores', profesoresController::class);

Route::resource('consultasDNI', consultaDNIController::class);
