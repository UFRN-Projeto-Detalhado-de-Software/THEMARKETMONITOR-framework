<?php
namespace App\Providers;

use App\Repositories\VendasRepositoryInterface;
use App\Repositories\VendasRepository;
use App\Http\Controllers\VendasController;
use App\Repositories\VendaRepositoryStrategy;
use App\Repositories\VendaRepositoryLoja;
use Illuminate\Support\ServiceProvider;

class VendasRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(VendasRepositoryInterface::class, VendasRepository::class);
        //$this->app->bind(VendaRepositoryStrategy::class, VendaRepositoryLoja::class);

    //$this->app->when(VendasController::class)
         //->needs(VendasRepositoryInterface::class)
         //->give(VendasRepository::class);

    //$this->app->when(VendasController::class)
        //->needs(VendaRepositoryStrategy::class)
        //->give(VendaRepositoryLoja::class);
    }
}
