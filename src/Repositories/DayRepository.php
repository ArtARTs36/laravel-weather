<?php

namespace ArtARTs36\LaravelWeather\Repositories;

use ArtARTs36\LaravelWeather\Models\Day;
use Illuminate\Support\Collection;

class DayRepository
{
    public function insert(array $values): bool
    {
        $date = new \DateTime();
        $model = new Day();

        foreach ($values as &$day) {
            $day = array_diff($day, $model->getFillable());
            $day[Day::CREATED_AT] = $date;
            $day[Day::UPDATED_AT] = $date;
        }

        return Day::query()->insert($values);
    }

    public function getByDates(\DateTimeInterface $start, \DateTimeInterface $end): Collection
    {
        return Day::query()
            ->whereDate(Day::FIELD_DATE, '>=', $start)
            ->whereDate(Day::FIELD_DATE, '<=', $end)
            ->get();
    }
}
