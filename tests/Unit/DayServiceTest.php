<?php

namespace ArtARTs36\LaravelWeather\Tests\Unit;

use ArtARTs36\LaravelWeather\Models\Day;
use ArtARTs36\LaravelWeather\Repositories\DayRepository;
use ArtARTs36\LaravelWeather\Services\DayService;
use ArtARTs36\LaravelWeather\Tests\TestCase;

final class DayServiceTest extends TestCase
{
    public function testBringAverageDailyTemperature(): void
    {
        $service = $this->app->make(DayService::class);

        $oneDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 40]);
        $twoDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 30]);

        $average = $service->bringAverageDailyTemperature([$oneDay, $twoDay]);

        self::assertEquals(35, $average);
    }

    public function testBringAverageDailyTemperatureByDates(): void
    {
        $service = $this->app->make(DayService::class);

        $oneDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 40]);
        $twoDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 30]);

        $average = $service->bringAverageDailyTemperatureByDates(
            min($oneDay->date, $twoDay->date),
            max($oneDay->date, $twoDay->date)
        );

        self::assertEquals(35, $average);
    }
}
