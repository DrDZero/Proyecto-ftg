<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\PartidasController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\ContadoresController;
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
    return view('welcome');
    //return "Proyecto de aplicación web para contadores varios";
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get ('/Juegos', [JuegosController::class, 'index'])->name('Juegos');
    Route::get('/Juegos/create', [JuegosController::class, 'create'])->name('nuevoJuego');
    Route::get('/Partida/create', [PartidasController::class, 'create'])->name('nuevaPartida');
    Route::post('/Juegos/store', [JuegosController::class, 'storeJuego'])->name('storeJuego');
    Route::post('/Partida/store', [PartidasController::class, 'storePartida'])->name('storePartida');
    Route::get('/Jugadores', [JugadoresController::class, 'index'])->name('Jugadores');
    Route::get('Jugador/create', [JugadoresController::class, 'create'])->name('nuevoJugador');
    Route::post('/Jugador/store', [JugadoresController::class, 'storeJugador'])->name('storeJugador');
    Route::get('/Partidas', [PartidasController::class, 'index'])->name('Partidas');
    Route::get('/Dados', function(){ return view('dado'); })->name('Dados');
    Route::get('/Contadores', [ContadoresController::class, 'index'])->name('Contadores');
    Route::post('/Contadores/store', [ContadoresController::class, 'storeContador'])->name('storeContador');
    Route::get('/Contadores/destroy/{contador}', [ContadoresController::class, 'destroy'])->name('destroyContador');
    Route::get('/Contadores/{contador}', [ContadoresController::class, 'show'])->name('viewContador');
//pendiente
    Route::get('/Juegos/show', [JuegosController::class, 'show'])->name('showJuego');
    Route::get('/Juego/update', [JuegosController::class, 'update'])->name('updateJuego');
});