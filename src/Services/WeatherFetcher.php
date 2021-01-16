<?php

namespace ArtARTs36\LaravelWeather\Services;

use ArtARTs36\LaravelWeather\Support\PlaceGetter;
use ArtARTs36\WeatherArchive\DriverFactory;
use Carbon\Carbon;

class WeatherFetcher
{
    protected $driverFactory;

    protected $creator;

    protected $placeGetter;

    public function __construct(DriverFactory $driverFactory, DayCreator $creator, PlaceGetter $placeGetter)
    {
        $this->driverFactory = $driverFactory;
        $this->creator = $creator;
        $this->placeGetter = $placeGetter;
    }

    public function byType(string $type): bool
    {
        $date = null;

        switch ($type) {
            case "prev-month":
                $date = Carbon::parse('1 month ago');
                break;
            default:
                $date = Carbon::now();
        }

        $driver = $this->driverFactory->byDate($date);

        $days = $driver->getOnMonth($date, $this->placeGetter->fromConfig());

        return $this->creator->createFromExternal($days);
    }
}
