<?php

namespace App\Weather;

class WeatherInfo {
    public function __construct(
        public string $city,
        public float $temperatureC, // Temperature in Celsius
        public string $weatherType
    ) {}
}
?>
