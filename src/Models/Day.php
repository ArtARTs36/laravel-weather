<?php

namespace ArtARTs36\LaravelWeather\Models;

use ArtARTs36\LaravelWeather\Support\CalledExternalDayMethods;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $date
 * @property int $temperature
 * @property int $pressure
 * @property int $wind
 * @property string $cloudy
 */
class Day extends Model
{
    use CalledExternalDayMethods;

    public const FIELD_DATE = 'date';
    public const FIELD_TEMPERATURE = 'temperature';
    public const FIELD_PRESSURE = 'pressure';
    public const FIELD_WIND = 'wind';
    public const FIELD_CLOUDY = 'cloudy';

    protected $table = 'weather_days';

    protected $fillable = [
        self::FIELD_TEMPERATURE,
        self::FIELD_DATE,
        self::FIELD_PRESSURE,
        self::FIELD_WIND,
        self::FIELD_CLOUDY,
    ];

    protected $dates = [
        self::FIELD_DATE,
    ];
}
