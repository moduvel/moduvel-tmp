<?php

namespace Moduvel\Core\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(CoreServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}