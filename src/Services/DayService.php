<?php

namespace ArtARTs36\LaravelWeather\Services;

use ArtARTs36\LaravelWeather\Models\Day;
use ArtARTs36\LaravelWeather\Repositories\DayRepository;

class DayService
{
    protected $repository;

    public function __construct(DayRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Day[] $days
     */
    public function bringAverageDailyTemperature(array $days): float
    {
        if (! $days) {
            return 0;
        }

        $summ = array_sum(array_map(function (Day $day) {
            return $day->temperature;
        }, $days));

        return $summ / count($days);
    }

    public function bringAverageDailyTemperatureByDates(\DateTimeInterface $start, \DateTimeInterface $end): float
    {
        return $this->bringAverageDailyTemperature($this->repository->getByDates($start, $end)->all());
    }
}
