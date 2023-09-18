<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
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

Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/vendas", [VendasController::class, 'index'])->name('vendas.index');
Route::get("/vendas/create", [VendasController::class, 'create'])->name('vendas.create');
Route::get("/vendas", [VendasController::class, 'store'])->name('vendas.store');
Route::get("/vendas/{venda}", [VendasController::class, 'show'])->name('vendas.show');
Route::get("/vendas/{venda}/edit", [VendasController::class, 'edit'])->name('vendas.edit');
Route::get("/vendas/{venda}", [VendasController::class, 'update'])->name('vendas.update');
Route::get("/vendas/{venda}", [VendasController::class, 'destroy'])->name('vendas.destroy');
