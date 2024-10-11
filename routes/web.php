<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardGamesController;
//app/Http/Controllers/BoardGamesController.php
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
Route::get ('/BoardGames', [BoardGamesController::class, 'bindex']);
Route::get('/BoardGames/create', [BoardGamesController::class, 'create']);
Route::get('/', [BoardGamesController::class, '']);