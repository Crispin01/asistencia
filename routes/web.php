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

Route::resource('alumnos', alumnosController::class);

Route::resource('profesores', profesoresController::class);

Route::get('consultas', [consultaDNIController::class, 'consultarDNI'])->name('consultas.dni');