<?php

namespace ArtARTs36\LaravelWeather\Providers;

use ArtARTs36\LaravelWeather\Console\Commands\FetchWeatherCommand;
use ArtARTs36\LaravelWeather\Services\WeatherFetcher;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;

class LaravelWeatherProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/weather.php', 'weather');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
            $this->commands([
                FetchWeatherCommand::class,
            ]);

            $this->registerFactories();
        }

        $this->registerWeatherFetcher();
    }

    protected function registerWeatherFetcher(): void
    {
        $this->app->singleton(WeatherFetcher::class);
    }

    protected function registerFactories(): self
    {
        if ($this->app->runningInConsole()) {
            $this->app->make(EloquentFactory::class)->load(__DIR__ . '/../../database/factories');
        }

        return $this;
    }
}
