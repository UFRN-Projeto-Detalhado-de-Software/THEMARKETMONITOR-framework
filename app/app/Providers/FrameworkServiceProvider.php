<?php

namespace App\Providers;

use App\Repositories\strategy\MetaRepositoryStrategy;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;
use App\Services\strategy\MetaServiceStrategy;
use App\Services\strategy\MetaServiceStrategyOriginal;
use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MetaRepositoryStrategy::class,
            MetaRepositoryStrategyOriginal::class);

        $this->app->bind(MetaServiceStrategy::class,
            MetaServiceStrategyOriginal::class);
    }
}
