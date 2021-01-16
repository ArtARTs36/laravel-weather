## Laravel Weather

With this package you can save dates of holidays or shortened days on your Laravel application.

![Testing](https://github.com/ArtARTs36/laravel-holiday/workflows/Testing/badge.svg?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<a href="https://poser.pugx.org/artarts36/laravel-holiday/d/total.svg">
    <img src="https://poser.pugx.org/artarts36/laravel-holiday/d/total.svg" alt="Total Downloads">
</a>

## Install

Run command: `composer require artarts36/laravel-weather`

Add Provider: `ArtARTs36\LaravelWeather\Providers\LaravelWeatherProvider`

Run command: `php artisan migrate`

## Commands

| Command                     | Description                              |
| ------------                | ------------                             |
| weather:fetch current-month  | Weathers for the current month are saved  |
| weather:fetch prev-month | Weathers for the previous month are saved |

## Examples

##### Fetch Weathers on current month

```php
$fetcher = app(\ArtARTs36\LaravelWeather\Services\WeatherFetcher::class);

$fetcher->byType('current-month');
```

##### Fetch Weathers on previous month

```php
$fetcher = app(\ArtARTs36\LaravelWeather\Services\WeatherFetcher::class);

$fetcher->byType('prev-month');
```
