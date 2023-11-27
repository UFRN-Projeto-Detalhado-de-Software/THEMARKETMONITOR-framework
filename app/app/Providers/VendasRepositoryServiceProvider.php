<?php

namespace App\Providers;

use App\Repositories\VendaRepositoryBanco;
use App\Repositories\VendaRepositoryCorretora;
use App\Repositories\VendaRepositoryLoja;
use Illuminate\Support\ServiceProvider;

class VendasRepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\VendasRepositoryInterface',
            'App\Repositories\VendasRepository'
        );
        $this->app->bind(VendaRepositoryStrategy::class, VendaRepositoryLoja::class);
        $this->app->bind(VendaRepositoryStrategy::class, VendaRepositoryBanco::class);
        $this->app->bind(VendaRepositoryStrategy::class, VendaRepositoryCorretora::class);

    }



}
