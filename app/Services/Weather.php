<?php
namespace App\Services;

use App\DataMap\WeatherObject;
use App\ThirdParty\YandexWeather;

class Weather
{
    /**
     * Получаем погоду из сервиса в настройках по координатам
     *
     * @param $lat
     * @param $lon
     * @return WeatherObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getWeather(float $lat, float $lon) : WeatherObject
    {
        switch (config('services.weather.current')) {
            case 'yandex':
            default:
                $model = new YandexWeather();
                break;
        }

        return $model->getWeather($lat, $lon);
    }
}