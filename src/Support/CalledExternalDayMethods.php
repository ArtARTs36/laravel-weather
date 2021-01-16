<?php

namespace ArtARTs36\LaravelWeather\Support;

use ArtARTs36\WeatherArchive\Entities\Day;

/**
 * @method bool isWarm()
 * @method string getTemperatureWithSign()
 */
trait CalledExternalDayMethods
{
    protected $externalDay;

    public function __call($method, $parameters)
    {
        if ($this->date && ! $this->externalDay) {
            $this->externalDay = new Day();
            $this->externalDay->day = $this->date->format('d');
            $this->externalDay->month = $this->date->format('m');
            $this->externalDay->year = $this->date->format('Y');
            $this->externalDay->temperature = $this->temperature;
            $this->externalDay->wind = $this->wind;
            $this->externalDay->pressure = $this->pressure;
            $this->externalDay->cloudy = $this->cloudy;
        }

        if (method_exists($this->externalDay, $method)) {
            return $this->externalDay->$method(...$parameters);
        }

        return parent::__call($method, $parameters);
    }
}
