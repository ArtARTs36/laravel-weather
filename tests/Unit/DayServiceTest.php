<?php

namespace ArtARTs36\LaravelWeather\Tests\Unit;

use ArtARTs36\LaravelWeather\Models\Day;
use ArtARTs36\LaravelWeather\Services\DayService;
use ArtARTs36\LaravelWeather\Tests\TestCase;

final class DayServiceTest extends TestCase
{
    /**
     * @covers \ArtARTs36\LaravelWeather\Services\DayService::bringAverageDailyTemperature
     */
    public function testBringAverageDailyTemperature(): void
    {
        $service = $this->app->make(DayService::class);

        /** @var Day $oneDay */
        $oneDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 40]);
        /** @var Day $twoDay */
        $twoDay = factory(Day::class)->create([Day::FIELD_TEMPERATURE => 30]);

        $average = $service->bringAverageDailyTemperature([$oneDay, $twoDay]);

        self::assertEquals(35, $average);

        // Empty array

        self::assertEquals(0, $service->bringAverageDailyTemperature([]));

        // Sum = 0

        $oneDay->temperature = -10;
        $twoDay->temperature = 10;

        self::assertEquals(0, $service->bringAverageDailyTemperature([$oneDay, $twoDay]));
    }

    /**
     * @covers \ArtARTs36\LaravelWeather\Services\DayService::bringAverageDailyTemperatureByDates
     */
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
