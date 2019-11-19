<?php
namespace App\ThirdParty;

use App\DataMap\WeatherObject;

interface IWeather
{
    /**
     * Получаем погоду из сервиса
     *
     * @param $lon
     * @param $lat
     * @return WeatherObject
     */
    public function getWeather(float $lon, float $lat) : WeatherObject;
}