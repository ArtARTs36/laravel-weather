<?php

namespace ArtARTs36\LaravelWeather\Providers;

use ArtARTs36\LaravelWeather\Console\Commands\FetchWeatherCommand;
use ArtARTs36\LaravelWeather\Services\WeatherFetcher;
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
        }

        $this->registerWeatherFetcher();
    }

    protected function registerWeatherFetcher(): void
    {
        $this->app->singleton(WeatherFetcher::class);
    }
}
