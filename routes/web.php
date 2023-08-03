<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MorseController;
use App\Http\Controllers\PokemonController;

use Illuminate\Http\Request;

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
    return view('pokemon');
});

#PokemonCrud ruta
Route::get('/pokemones', [PokemonController::class, 'index'])->name('pokemon-list');
Route::get('/pokemones/create', [PokemonController::class, 'create'])->name('pokemones.create');
Route::post('/pokemones/store', [PokemonController::class, 'store'])->name('pokemones.store');
Route::get('/pokemones/{id}/edit', [PokemonController::class, 'edit'])->name('pokemones.edit');
Route::put('/pokemones/{id}', [PokemonController::class, 'update'])->name('pokemones.update');
Route::delete('/pokemones/{id}/destroy', [PokemonController::class, 'destroy'])->name('pokemones.destroy');

#rutas exclusivas de usuario
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/info', function () {
        return view('PokeInfo');
    })->name('dashboard');
});

#Rutas de la pantalla codigo morse
Route::get('/morse', function () {
    return view('morse');
});

Route::post('/morse/translate', [MorseController::class, 'morseToText'])->name('morse.translate');

Route::post('/text/translate', [MorseController::class, 'textToMorse'])->name('text.translate');

#Ruta Matriz
Route::get('/matriz', function () {
    return view('matriz');
});