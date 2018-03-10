<?php

namespace Moduvel\Core\Providers;

use Illuminate\Routing\Router;
use Moduvel\Core\Http\Middlewares\CheckLocalization;
use Moduvel\Core\Http\Middlewares\RedirectIfAuthenticated;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    protected $namespace = 'Moduvel\Core\Http';

    public function boot(Router $router)
    {
        parent::boot($router);

        // Guest Backend Routes
        $this->loadBackendGuestRoutes($router);

        // Root Backend Route Redirection
        $router->redirect('/'.config('moduvel-core.backend-segment-name'), locale().'/'.config('moduvel-core.backend-segment-name'));

        // Root Frontend Route Redirection
        $router->redirect('/', locale().'/');
    }

    protected function loadBackendGuestRoutes($router)
    {
        $router->group([
            'prefix' => '{locale}/'.config('moduvel-core.backend-segment-name'),
            'namespace' => $this->namespace . '\Backend',
            'middleware' => [
                'web',
                RedirectIfAuthenticated::class,
                CheckLocalization::class,
            ],
        ], function($router) {
            require __DIR__.'/../../routes/backend-guest.php';
        });
    }

    protected function getBackendRoutes()
    {
        return __DIR__.'/../../routes/backend.php';
    }
}