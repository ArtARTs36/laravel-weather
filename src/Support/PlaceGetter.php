<?php

namespace ArtARTs36\LaravelWeather\Support;

use ArtARTs36\WeatherArchive\Entities\Place;

class PlaceGetter
{
    public function fromConfig(): Place
    {
        return new Place(config('weather.default_place'));
    }
}
