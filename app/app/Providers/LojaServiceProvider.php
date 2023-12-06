<?php

namespace App\Providers;

use App\Repositories\VendaRepositoryLoja;
use App\Repositories\VendaRepositoryStrategy;
use App\Services\VendaServiceLoja;
use App\Services\VendaServiceStrategy;
use App\Services\VendasService;
use Illuminate\Support\ServiceProvider;

class LojaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VendaServiceStrategy::class, VendaServiceLoja::class);
        $this->app->bind(VendaRepositoryStrategy::class, VendaRepositoryLoja::class);


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
