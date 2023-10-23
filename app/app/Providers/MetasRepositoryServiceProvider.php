<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MetasRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\MetasRepositoryInterface',
            'App\Repositories\MetasRepository'
        );
    }
}
