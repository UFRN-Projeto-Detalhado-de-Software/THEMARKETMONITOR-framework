<?php

use App\Http\Controllers\MeioPagamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\TipoVendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrigemVendaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PeriodoTipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetaController;

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



// Rotas de Periodo (incluso tipo)
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

// Rotas de Meta
Route::name('meta.')->group(function (){
    Route::prefix('/meta')->group(function (){
        // Get
        Route::get('/', [MetaController::class, 'home'])->name('home');
        Route::get('/novo', [MetaController::class, 'create'])->name('create');
        Route::get('/editar/{meta}', [MetaController::class, 'formEdit'])->name('formEdit');

        // Post
        Route::post('/store', [MetaController::class, 'store'])->name('store');

        // Put
        Route::put('/edit/{meta}', [MetaController::class, 'edit'])->name('edit');

        // Delete
        Route::delete('/destroy/{meta}', [MetaController::class, 'destroy'])->name('destroy');
    });
});

// Rotas Meio de Pagamento
Route::resource('/meiopagamento', MeioPagamentoController::class);


// Rotas de Periodo
Route::name('perfil.')->group(function (){
    Route::prefix('/perfil')->group(function (){
        //Get
        Route::get('/register', [UserController::class, 'showRegister'])->name('register');
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/login', [UserController::class, 'showLogin'])->name('login');
        //Post
        Route::post('/register/do', [UserController::class, 'getRegister'])->name('register.do');
        Route::post('/login/do', [UserController::class, 'getLogin'])->name('login.do');
        //Put

        //Delete

    });
});






//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
