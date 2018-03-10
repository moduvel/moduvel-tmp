<?php

namespace Moduvel\Core\Tests;

use Moduvel\Core\Providers\BootstrapServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected $locales_config = [
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'direction' => 'ltr', 'regional' => 'en_GB'],
        'es' => ['name' => 'Spanish', 'script' => 'Latn', 'native' => 'español', 'direction' => 'ltr', 'regional' => 'es_ES'],
        'bn' => ['name' => 'Bengali', 'script' => 'Beng', 'native' => 'বাংলা', 'direction' => 'ltr', 'regional' => 'bn_BD'],
    ];

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {
        parent::setUp();

        config()->set('moduvel-locales.supportedLocales', $this->locales_config);
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
            BootstrapServiceProvider::class,
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