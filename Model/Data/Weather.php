<?php

namespace Achi\WeatherApp\Model\Data;

use Achi\WeatherApp\Api\Data\WeatherInterface;
use Magento\Framework\DataObject;

class Weather extends DataObject implements WeatherInterface
{
    /**
     * Getter for City.
     *
     * @return int|null
     */
    public function getCity(): ?int
    {
        return $this->getData(self::CITY) === null ? null
            : (int)$this->getData(self::CITY);
    }

    /**
     * Setter for City.
     *
     * @param int|null $city
     *
     * @return void
     */
    public function setCity(?int $city): void
    {
        $this->setData(self::CITY, $city);
    }

    /**
     * Getter for Country.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * Setter for Country.
     *
     * @param string|null $country
     *
     * @return void
     */
    public function setCountry(?string $country): void
    {
        $this->setData(self::COUNTRY, $country);
    }

    /**
     * Getter for Description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Setter for Description.
     *
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Getter for Temperature.
     *
     * @return string|null
     */
    public function getTemperature(): ?string
    {
        return $this->getData(self::TEMPERATURE);
    }

    /**
     * Setter for Temperature.
     *
     * @param string|null $temperature
     *
     * @return void
     */
    public function setTemperature(?string $temperature): void
    {
        $this->setData(self::TEMPERATURE, $temperature);
    }

    /**
     * Getter for FeelsLike.
     *
     * @return string|null
     */
    public function getFeelsLike(): ?string
    {
        return $this->getData(self::FEELS_LIKE);
    }

    /**
     * Setter for FeelsLike.
     *
     * @param string|null $feelsLike
     *
     * @return void
     */
    public function setFeelsLike(?string $feelsLike): void
    {
        $this->setData(self::FEELS_LIKE, $feelsLike);
    }

    /**
     * Getter for Pressure.
     *
     * @return string|null
     */
    public function getPressure(): ?string
    {
        return $this->getData(self::PRESSURE);
    }

    /**
     * Setter for Pressure.
     *
     * @param string|null $pressure
     *
     * @return void
     */
    public function setPressure(?string $pressure): void
    {
        $this->setData(self::PRESSURE, $pressure);
    }

    /**
     * Getter for Humidity.
     *
     * @return string|null
     */
    public function getHumidity(): ?string
    {
        return $this->getData(self::HUMIDITY);
    }

    /**
     * Setter for Humidity.
     *
     * @param string|null $humidity
     *
     * @return void
     */
    public function setHumidity(?string $humidity): void
    {
        $this->setData(self::HUMIDITY, $humidity);
    }

    /**
     * Getter for WindSpeed.
     *
     * @return string|null
     */
    public function getWindSpeed(): ?string
    {
        return $this->getData(self::WIND_SPEED);
    }

    /**
     * Setter for WindSpeed.
     *
     * @param string|null $windSpeed
     *
     * @return void
     */
    public function setWindSpeed(?string $windSpeed): void
    {
        $this->setData(self::WIND_SPEED, $windSpeed);
    }

    /**
     * Getter for Sunrise.
     *
     * @return string|null
     */
    public function getSunrise(): ?string
    {
        return $this->getData(self::SUNRISE);
    }

    /**
     * Setter for Sunrise.
     *
     * @param string|null $sunrise
     *
     * @return void
     */
    public function setSunrise(?string $sunrise): void
    {
        $this->setData(self::SUNRISE, $sunrise);
    }

    /**
     * Getter for Sunset.
     *
     * @return string|null
     */
    public function getSunset(): ?string
    {
        return $this->getData(self::SUNSET);
    }

    /**
     * Setter for Sunset.
     *
     * @param string|null $sunset
     *
     * @return void
     */
    public function setSunset(?string $sunset): void
    {
        $this->setData(self::SUNSET, $sunset);
    }
}
