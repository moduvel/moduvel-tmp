<?php

namespace Moduvel\Core\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Moduvel\Core\Http\Middlewares\CheckLocalization;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

abstract class BaseRouteServiceProvider extends ServiceProvider
{
    protected $namespace = '';

    protected $defer = false;

    public function register()
    {
        //
    }

    public function boot(Router $router)
    {
        foreach (locales() as $locale) {
            // Backend Routes
            $router->group([
                'prefix' => $locale.'/'.config('moduvel-core.backend-segment-name'),
                'namespace' => $this->namespace . '\Backend',
                'middleware' => [
                    'web',
                    CheckLocalization::class,
                ],
            ], function($router) use ($locale) {
                include $this->getBackendRoutes();
            });
        }
    }

    public function provides()
    {
        return [];
    }
}