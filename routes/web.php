<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\PartidasController;
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
    //return view('welcome');
    return "Proyecto de aplicación web para contadores varios";
});
Route::get ('/Juegos', [JuegosController::class, 'index'])->name('Juegos');
Route::get('/Juegos/create', [JuegosController::class, 'create'])->name('nuevoJuego');
Route::get('/Juegos/show', [JuegosController::class, 'show'])->name('showJuego');
Route::get('/Partida/create', [PartidasController::class, 'create'])->name('nuevaPartida');
Route::get('/Juego/update', [JuegosCtroller::class, 'update'])->name('updateJuego');
Route::post('/Juegos/store', [JuegosController::class, 'storeJuego'])->name('storeJuego');
Route::post('/Partida/store', [PartidasController::class, 'storePartida'])->name('storePartida');