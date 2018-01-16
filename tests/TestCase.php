<?php

namespace Moduvel\Core\Tests;

use Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider;
use Moduvel\Core\Providers\CoreServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Orchestra\Testbench\Traits\WithFactories;

class TestCase extends OrchestraTestCase
{
    use WithFactories;

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');
    }

    /**
     * Define Package Provides.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getPackageProviders($app)
    {
        return [
            CoreServiceProvider::class,
        ];
    }

    /**
     * Define Pacakge Aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getPackageAliases($app)
    {
        return [];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        // $app['config']->set('database.default', 'testbench');
        // $app['config']->set('database.connections.testbench', [
        //     'driver'   => 'sqlite',
        //     'database' => ':memory:',
        //     'prefix'   => '',
        // ]);
    }
}