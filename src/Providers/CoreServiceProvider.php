<?php

namespace Moduvel\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as ModelFactory;

class CoreServiceProvider extends ServiceProvider
{
	public function register()
	{
        $this->mergeConfigFrom(__DIR__.'/../../config/moduvel-core.php', 'moduvel-core');
        $this->mergeConfigFrom(__DIR__.'/../../config/moduvel-locales.php', 'moduvel-locales');

        $this->app->make(ModelFactory::class)->load(__DIR__.'/../../database/factories');

        // $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        // $loader->alias('LaravelLocalization',\Mcamara\LaravelLocalization\Facades\LaravelLocalization::class);
	}

	public function boot()
	{
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'moduvel-core');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'moduvel-core');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->publishes([__DIR__.'/../../config' => config_path()], 'config');

        // $this->app['view']->addNamespace('abdcms-lv/theme', __DIR__ . '/../resources/themes/'.config('abdcms-lv.theme').'/views');

        // // $this->publishes([__DIR__ . '/../resources/views' => base_path('resources/views/vendor/abdcms-lv/core')], 'views');
        // // $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang/vendor/abdcms-lv/core')],'lang');

        // // Themes
        // $this->publishes([__DIR__ . '/../resources/themes/'.config('abdcms-lv.theme').'/assets/dist' => public_path('themes/'.config('abdcms-lv.theme').'/app')], 'assets');
	}
}