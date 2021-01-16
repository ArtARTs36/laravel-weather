<?php

namespace ArtARTs36\LaravelWeather\Tests\Unit;

use ArtARTs36\LaravelWeather\Services\DayCreator;
use ArtARTs36\LaravelWeather\Tests\TestCase;
use ArtARTs36\WeatherArchive\Entities\Day;

final class DayCreatorTest extends TestCase
{
    public function testCreate(): void
    {
        $creator = $this->app->make(DayCreator::class);

        //

        $day = new Day();

        $day->day = 11;
        $day->month = 11;
        $day->year = 2020;
        $day->temperature = 20;
        $day->wind = 20;
        $day->cloudy = '1 мс';
        $day->pressure = 20;

        $creator->createFromExternal([$day]);

        /** @var \ArtARTs36\LaravelWeather\Models\Day $createdDay */
        $createdDay = \ArtARTs36\LaravelWeather\Models\Day::query()->first();

        self::assertNotNull($createdDay);

        self::assertEquals($day->temperature, $createdDay->temperature);
        self::assertEquals($day->wind, $createdDay->wind);
        self::assertEquals($day->cloudy, $createdDay->cloudy);
        self::assertEquals($day->pressure, $createdDay->pressure);
        self::assertEquals(
            "{$day->year}-{$day->month}-{$day->day}",
            $createdDay->date->format('Y-m-d')
        );
    }
}
