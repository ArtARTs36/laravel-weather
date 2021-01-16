<?php

namespace ArtARTs36\LaravelWeather\Console\Commands;

use ArtARTs36\LaravelWeather\Models\Day;
use ArtARTs36\LaravelWeather\Services\WeatherFetcher;
use Illuminate\Console\Command;

class FetchWeatherCommand extends Command
{
    protected $signature = 'weather:fetch {type}';

    public function handle(WeatherFetcher $fetcher)
    {
        $before = Day::query()->count();

        $fetcher->byType($this->argument('type'));

        $created = Day::query()->count() - $before;

        $this->comment('Create days: '. $created);
    }
}
