<?php

namespace ArtARTs36\LaravelWeather\Services;

use ArtARTs36\WeatherArchive\Contracts\Driver;
use ArtARTs36\WeatherArchive\DriverFactory;
use ArtARTs36\WeatherArchive\Entities\Place;
use Carbon\Carbon;

class WeatherFetcher
{
    protected $driverFactory;

    protected $creator;

    public function __construct(DriverFactory $driverFactory, DayCreator $creator)
    {
        $this->driverFactory = $driverFactory;
        $this->creator = $creator;
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

        $days = $driver->getOnMonth($date, $this->createPlace($driver));

        return $this->creator->createFromExternal($days);
    }

    protected function createPlace(Driver $driver): Place
    {
        return new Place(config('weather.default_place')[get_class($driver)]);
    }
}
