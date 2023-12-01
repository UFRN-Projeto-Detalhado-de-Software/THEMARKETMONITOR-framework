<?php

namespace App\Providers;

use App\Repositories\strategy\MetaRepositoryStrategy;
use App\Repositories\strategy\MetaRepositoryStrategyLoja;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;
use App\Services\strategy\MetaServiceStrategy;
use App\Services\strategy\MetaServiceStrategyLoja;
use App\Services\strategy\MetaServiceStrategyOriginal;
use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MetaRepositoryStrategy::class,
            MetaRepositoryStrategyLoja::class);

        $this->app->bind(MetaServiceStrategy::class,
            MetaServiceStrategyLoja::class);
    }
}
