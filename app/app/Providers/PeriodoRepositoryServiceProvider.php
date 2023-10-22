<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PeriodoRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\PeriodoRepositoryInterface',
            'App\Repositories\PeriodoRepository'
        );
    }
}
