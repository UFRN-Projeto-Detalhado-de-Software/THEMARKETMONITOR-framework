<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FuncionariosRepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\FuncionariosRepositoryInterface',
            'App\Repositories\FuncionariosRepository'
        );
    }

}
