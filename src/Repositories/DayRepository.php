<?php

namespace ArtARTs36\LaravelWeather\Repositories;

use ArtARTs36\LaravelWeather\Models\Day;

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
}
