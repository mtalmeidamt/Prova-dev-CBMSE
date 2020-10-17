<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\TipoContatoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/pessoa/create', [PessoaController::class, 'create'])->name('pessoa.create');
Route::post('/pessoa/store', [PessoaController::class, 'store'])->name('pessoa.store');


Route::get('/contato/create', [ContatoController::class, 'create'])->name('contato.create');
Route::post('/contato/store', [ContatoController::class, 'store'])->name('contato.store');
Route::get('/contato/{id}/show', [ContatoController::class, 'show'])->name('contato.show');
Route::delete('/contato/{id}/destroy', [ContatoController::class, 'destroy'])->name('contato.destroy');
Route::put('/contato/{id}/update',[ContatoController::class, 'update'])->name('contato.update');

Route::get('/tipocontato/create', [TipoContatoController::class, 'create'])->name('tipocontato.create');
Route::post('/tipocontato/store', [TipoContatoController::class, 'store'])->name('tipocontato.store');
Route::delete('/tipocontato/{id}/destroy', [TipoContatoController::class, 'destroy'])->name('tipocontato.destroy');


Route::get('/', function () {
    return view('welcome');
});
