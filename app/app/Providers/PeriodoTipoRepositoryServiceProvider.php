<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PeriodoTipoRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\PeriodoTipoRepositoryInterface',
            'App\Repositories\PeriodoTipoRepository'
        );
    }

}
