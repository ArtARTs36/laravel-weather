<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ArtARTs36\LaravelWeather\Models\Day;
use Faker\Generator as Faker;

$factory->define(Day::class, function (Faker $faker) {
    return [
        Day::FIELD_TEMPERATURE => rand(20, 35),
        Day::FIELD_DATE => $faker->date(),
        Day::FIELD_PRESSURE => $faker->randomNumber(),
        Day::FIELD_WIND => $faker->randomNumber(),
        Day::FIELD_CLOUDY => $faker->randomNumber(),
    ];
});
