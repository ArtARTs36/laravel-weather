<?php

namespace ArtARTs36\LaravelWeather\Services;

use ArtARTs36\LaravelWeather\Repositories\DayRepository;
use ArtARTs36\WeatherArchive\Entities\Day as ExternalDay;
use ArtARTs36\LaravelWeather\Models\Day;

class DayCreator
{
    protected $repository;

    public function __construct(DayRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ExternalDay[] $values
     * @return bool
     */
    public function createFromExternal(array $values): bool
    {
        return $this->repository->insert(array_map(function (ExternalDay $day) {
            return [
                Day::FIELD_DATE => "{$day->year}-{$day->month}-{$day->day}",
                Day::FIELD_CLOUDY => $day->cloudy,
                Day::FIELD_WIND => $day->wind,
                Day::FIELD_PRESSURE => $day->pressure,
                Day::FIELD_TEMPERATURE => $day->temperature,
            ];
        }, $values));
    }
}
