<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\TipoVendaController;
use App\Http\Controllers\HomeController;

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


use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas Funcionario

Route::get('/funcionario/create', [FuncionarioController::class, 'create']);

Route::get('/funcionario', [FuncionarioController::class, 'home']);

Route::post('/funcionario/recebido', [FuncionarioController::class, 'store']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);
Route::post('/funcionario/edited/{id}', [FuncionarioController::class, 'edited']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);

Route::get('/funcionario/deleted/{id}', [FuncionarioController::class, 'deleted']);

//Route::get("/", [VendasController::class, 'index'])->name('vendas');
//Route::get("/vendas", [VendasController::class, 'index'])->name('vendas.index');
//Route::get("/vendas/create", [VendasController::class, 'create'])->name('vendas.create');
//Route::post("/vendas", [VendasController::class, 'store'])->name('vendas.store');
//Route::get("/vendas/{venda}", [VendasController::class, 'show'])->name('vendas.show');
//Route::get("/vendas/{venda}/edit", [VendasController::class, 'edit'])->name('vendas.edit');
//Route::put("/vendas/{venda}", [VendasController::class, 'update'])->name('vendas.update');
//Route::delete("/vendas/{venda}", [VendasController::class, 'destroy'])->name('vendas.destroy');

// Rotas Venda
Route::resource('/venda/vendas', VendasController::class);

// Rotas Tipos Vendas
Route::resource('/tipovenda', TipoVendaController::class);
