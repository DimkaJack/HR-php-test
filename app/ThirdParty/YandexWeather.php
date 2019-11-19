<?php
namespace App\ThirdParty;

use App\DataMap\WeatherObject;
use GuzzleHttp\Client;

class YandexWeather implements IWeather
{
    /**
     * Получаем погоду из яндекса
     *
     * @param float $lon
     * @param float $lat
     * @return WeatherObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWeather(float $lon, float $lat) : WeatherObject
    {
        $client = new Client();
        $response = $client->request('GET', config('services.weather.yandex.url'), [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'lang' => $this->getLocale(config('app.locale')),
                'limit' => config('services.weather.yandex.limit'),
                'hours' => config('services.weather.yandex.hours'),
                'extra' => config('services.weather.yandex.extra'),
            ],
            'headers' => [
                'X-Yandex-API-Key' => config('services.weather.yandex.key')
            ],
        ]);

        $response = $response->getBody()->getContents();
        $response = json_decode($response);

        $data = new WeatherObject();
        $data->setTemperature($response->fact->temp);

        return $data;
    }

    /**
     * Определяем локаль на основе настроек Laravel
     *
     * @param $key
     * @return string
     */
    private function getLocale($key)
    {
        $locales = [
            'ru' => 'ru_RU',
            'ua' => 'uk_UA',
            'be' => 'be_BY',
            'kk' => 'kk_KZ',
            'tr' => 'tr_TR',
            'en' => 'en_US',
        ];

        return $locales[$key] ?: 'en_US';
    }
}