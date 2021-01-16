<?php

namespace ArtARTs36\LaravelWeather\Support;

use ArtARTs36\WeatherArchive\Contracts\Driver;
use ArtARTs36\WeatherArchive\Entities\Place;

class PlaceGetter
{
    public function fromConfig(Driver $driver): Place
    {
        return new Place(value(config('weather.default_place')[get_class($driver)]));
    }
}
