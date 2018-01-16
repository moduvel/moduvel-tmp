<?php

namespace Moduvel\Core\Providers;

use Illuminate\Routing\Router;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    protected $namespace = 'Moduvel\Core\Http';

    public function boot(Router $router)
    {
        parent::boot($router);

        // Root Backend Route Redirection
        $router->redirect('/'.config('moduvel-core.backend-segment-name'), locale().'/'.config('moduvel-core.backend-segment-name'));

        // Root Frontend Route Redirection
        $router->redirect('/', locale().'/');
    }

    protected function getBackendRoutes()
    {
        return __DIR__.'/../../routes/backend.php';
    }
}