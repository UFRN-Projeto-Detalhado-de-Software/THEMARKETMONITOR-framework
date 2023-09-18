<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/funcionario/create', [FuncionarioController::class, 'create']);

Route::get('/funcionario', [FuncionarioController::class, 'home']);

Route::post('/funcionario/recebido', [FuncionarioController::class, 'store']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);
Route::post('/funcionario/edited/{id}', [FuncionarioController::class, 'edited']);

Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit']);

Route::get('/funcionario/deleted/{id}', [FuncionarioController::class, 'deleted']);
