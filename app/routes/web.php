<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\TipoVendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrigemVendaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PeriodoTipoController;

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


// Rotas Venda
Route::resource('/venda/vendas', VendasController::class);

// Rotas Origens de Venda
Route::resource('/origensvendas/origemvenda', OrigemVendaController::class);

// Rotas Tipos de Venda
Route::resource('/tipovenda', TipoVendaController::class);


// Rotas de Periodo
Route::name('periodo.')->group(function (){
    Route::prefix('/periodo')->group(function (){
        // Get
        Route::get('/', [PeriodoController::class, 'home'])->name('home');
        Route::get('/novo', [PeriodoController::class, 'create'])->name('create');
        Route::get('/editar/{periodo}', [PeriodoController::class, 'formEdit'])->name('formEdit');

        // Post
        Route::post('/store', [PeriodoController::class, 'store'])->name('store');

        // Put
        Route::put('/edit/{periodo}', [PeriodoController::class, 'edit'])->name('edit');

        // Delete
        Route::delete('/destroy/{periodo}', [PeriodoController::class, 'destroy'])->name('destroy');

        // Rotas de periodoTipo
        Route::name('tipo.')->group(function (){
            Route::prefix('/tipo')->group(function (){
                // Get
                Route::get('/', [PeriodoTipoController::class, 'home'])->name('home');
                Route::get('/novo', [PeriodoTipoController::class, 'create'])->name('create');
                Route::get('/editar/{periodoTipo}', [PeriodoTipoController::class, 'formEdit'])->name('formEdit');

                // Post
                Route::post('/store', [PeriodoTipoController::class, 'store'])->name('store');

                // Put
                Route::put('/edit/{periodoTipo}', [PeriodoTipoController::class, 'edit'])->name('edit');

                // Delete
                Route::delete('/destroy/{periodoTipo}', [PeriodoTipoController::class, 'destroy'])->name('destroy');

            });
        });
    });
});
