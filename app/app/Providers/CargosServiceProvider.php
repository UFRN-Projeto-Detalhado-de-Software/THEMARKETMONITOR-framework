<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CargosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\CargosRepositoryInterface',
            'App\Repositories\CargosRepository'
        );
    }
}
