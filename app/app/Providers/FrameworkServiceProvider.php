<?php

namespace App\Providers;

use App\Repositories\strategy\MetaRepositoryStrategy;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;
use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MetaRepositoryStrategy::class,
            MetaRepositoryStrategyOriginal::class);
    }
}
