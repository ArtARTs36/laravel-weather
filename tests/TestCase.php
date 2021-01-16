<?php

namespace ArtARTs36\LaravelWeather\Tests;

use ArtARTs36\LaravelWeather\Providers\LaravelWeatherProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setup() : void
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testing']);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadLaravelMigrations(['--database' => 'testing']);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [LaravelWeatherProvider::class];
    }
}
