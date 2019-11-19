<?php

namespace App\DataMap;

class WeatherObject
{
    protected $temperature;
    protected $city;

    /**
     * @return integer
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param integer $_value
     */
    public function setTemperature($_value)
    {
        $this->temperature = $_value;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $_value
     */
    public function setCity($_value)
    {
        $this->city = $_value;
    }
}