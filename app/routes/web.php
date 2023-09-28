<?php

use App\Http\Controllers\MeioPagamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\TipoVendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrigemVendaController;

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

Route::get('/faturamento', function(){return view('Faturamento');});

// Rotas Funcionario

Route::get('/funcionario/create', [FuncionarioController::class, 'create']);

Route::get('/funcionario', [FuncionarioController::class, 'home']);

Route::post('/funcionario/recebido', [FuncionarioController::class, 'store']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);
Route::post('/funcionario/edited/{id}', [FuncionarioController::class, 'edited']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);

Route::get('/funcionario/deleted/{id}', [FuncionarioController::class, 'deleted']);

// Rotas Vendas
Route::resource('/venda/vendas', VendasController::class);

// Rotas Origens de Venda
Route::resource('/origensvendas/origemvenda', OrigemVendaController::class);

// Rotas Tipos de Venda
Route::resource('/tipovenda', TipoVendaController::class);

// Rotas Meio de Pagamento
Route::resource('/meiopagamento', MeioPagamentoController::class);
