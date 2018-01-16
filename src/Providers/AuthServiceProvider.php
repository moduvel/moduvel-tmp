<?php

namespace Moduvel\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Moduvel\Core\Entities\BackendUser;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->configBackendAuthentication();
    }

    public function boot()
    {
        //
    }

    protected function configBackendAuthentication()
    {
        config()->set('auth.guards.backend', [
            'driver' => 'session',
            'provider' => 'backend_users',
        ]);

        config()->set('auth.providers.backend_users', [
            'driver' => 'eloquent',
            'model' => BackendUser::class,
        ]);

        config()->set('auth.passwords.backend_users', [
            'provider' => 'backend_users',
            'table' => 'backend_password_resets',
            'expire' => 60,
        ]);
    }
}