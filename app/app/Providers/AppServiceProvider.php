<?php

namespace App\Providers;

use App\Repositories\VendaRepositoryCorretora;
use App\Repositories\VendaRepositoryBanco;
use App\Repositories\VendaRepositoryLoja;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
