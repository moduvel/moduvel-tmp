<?php

namespace Moduvel\Core\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Moduvel\Core\Http\Middlewares\CheckLocalization;
use Moduvel\Core\Http\Middlewares\BackendAuthenticate;

abstract class BaseRouteServiceProvider extends ServiceProvider
{
    protected $namespace = '';

    public function boot(Router $router)
    {
        static $bootedOnce = false;

        if ( ! $bootedOnce) {
            // Set Locale Pattern to use in the system
            $router->pattern('locale', '(' . implode('|', locales()) . ')');

            $bootedOnce = true;
        }

        // Backend Routes
        $router->group([
            'prefix' => '{locale}/'.config('moduvel-core.backend-segment-name'),
            'namespace' => $this->namespace . '\Backend',
            'middleware' => [
                'web',
                BackendAuthenticate::class,
                CheckLocalization::class,
            ],
        ], function($router) {
            require $this->getBackendRoutes();
        });
    }
}