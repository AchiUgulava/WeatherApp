<?php

namespace Achi\WeatherApp\Api\Data;

interface WeatherInterface
{
    /**
     * String constants for property names
     */
    const CITY = "city";
    const COUNTRY = "country";
    const DESCRIPTION = "description";
    const TEMPERATURE = "temperature";
    const FEELS_LIKE = "feels_like";
    const PRESSURE = "pressure";
    const HUMIDITY = "humidity";
    const WIND_SPEED = "wind_speed";
    const SUNRISE = "sunrise";
    const SUNSET = "sunset";

    /**
     * Getter for City.
     *
     * @return int|null
     */
    public function getCity(): ?int;

    /**
     * Setter for City.
     *
     * @param int|null $city
     *
     * @return void
     */
    public function setCity(?int $city): void;

    /**
     * Getter for Country.
     *
     * @return string|null
     */
    public function getCountry(): ?string;

    /**
     * Setter for Country.
     *
     * @param string|null $country
     *
     * @return void
     */
    public function setCountry(?string $country): void;

    /**
     * Getter for Description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Setter for Description.
     *
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void;

    /**
     * Getter for Temperature.
     *
     * @return string|null
     */
    public function getTemperature(): ?string;

    /**
     * Setter for Temperature.
     *
     * @param string|null $temperature
     *
     * @return void
     */
    public function setTemperature(?string $temperature): void;

    /**
     * Getter for FeelsLike.
     *
     * @return string|null
     */
    public function getFeelsLike(): ?string;

    /**
     * Setter for FeelsLike.
     *
     * @param string|null $feelsLike
     *
     * @return void
     */
    public function setFeelsLike(?string $feelsLike): void;

    /**
     * Getter for Pressure.
     *
     * @return string|null
     */
    public function getPressure(): ?string;

    /**
     * Setter for Pressure.
     *
     * @param string|null $pressure
     *
     * @return void
     */
    public function setPressure(?string $pressure): void;

    /**
     * Getter for Humidity.
     *
     * @return string|null
     */
    public function getHumidity(): ?string;

    /**
     * Setter for Humidity.
     *
     * @param string|null $humidity
     *
     * @return void
     */
    public function setHumidity(?string $humidity): void;

    /**
     * Getter for WindSpeed.
     *
     * @return string|null
     */
    public function getWindSpeed(): ?string;

    /**
     * Setter for WindSpeed.
     *
     * @param string|null $windSpeed
     *
     * @return void
     */
    public function setWindSpeed(?string $windSpeed): void;

    /**
     * Getter for Sunrise.
     *
     * @return string|null
     */
    public function getSunrise(): ?string;

    /**
     * Setter for Sunrise.
     *
     * @param string|null $sunrise
     *
     * @return void
     */
    public function setSunrise(?string $sunrise): void;

    /**
     * Getter for Sunset.
     *
     * @return string|null
     */
    public function getSunset(): ?string;

    /**
     * Setter for Sunset.
     *
     * @param string|null $sunset
     *
     * @return void
     */
    public function setSunset(?string $sunset): void;
}
