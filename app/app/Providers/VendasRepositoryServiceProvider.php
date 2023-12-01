<?php
namespace App\Providers;

use App\Http\Controllers\Abstract\VendaControllerAbs;
use App\Http\Controllers\VendaControllerLoja;
use App\Repositories\VendaRepositoryLoja;
use App\Repositories\VendaRepositoryStrategy;
use App\Repositories\VendasRepository;
use App\Repositories\VendasRepositoryInterface;
use App\Services\VendaServiceLoja;
use Illuminate\Support\ServiceProvider;

class VendasRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(VendasRepositoryInterface::class, VendasRepository::class);
    }

}
