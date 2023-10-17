<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VendasRepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\VendasRepositoryInterface',
            'App\Repositories\VendasRepository'
        );
    }


}
