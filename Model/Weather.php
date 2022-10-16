<?php

namespace Achi\WeatherApp\Model;

use Magento\Framework\Model\AbstractModel;
use Achi\WeatherApp\Model\ResourceModel\Weather as WeatherResourceModel;
use Achi\WeatherApp\Api\Data\WeatherInterface;
class Weather extends AbstractModel implements WeatherInterface
{
    /**
     * @var string
     */
    const CACHE_TAG = 'achi_weatherapp_weather';
	protected $_cacheTag = 'achi_weatherapp_weather';
    protected $_eventPrefix = 'weather_model';

    protected function _construct()
    {
        $this->_init(WeatherResourceModel::class);
    }
    public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
    public function setCity(string $city)
    {
        return $this->setData(WeatherInterface::CITY, $city);
    }

    public function getCity()
    {
        return $this->getData(self::CITY);
    }

    public function setCountry(string $country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    public function setDescription(string $description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setTemperature(float $temperature)
    {
        return $this->setData(self::TEMPERATURE, $temperature);
    }

    public function getTemperature()
    {
        return $this->getData(self::TEMPERATURE);
    }

    public function setFeelsLike(int $feelsLike)
    {
        return $this->setData(self::FEELS_LIKE, $feelsLike);
    }

    public function getFeelsLike()
    {
        return $this->getData(self::FEELS_LIKE);
    }

    public function setPressure(int $pressure)
    {
        return $this->setData(self::PRESSURE, $pressure);
    }

    public function getPressure()
    {
        return $this->getData(self::PRESSURE);
    }

    public function setHumidity(int $humidity)
    {
        return $this->setData(self::HUMIDITY, $humidity);
    }

    public function getHumidity()
    {
        return $this->getData(self::HUMIDITY);
    }

    public function setWindSpeed(float $windSpeed)
    {
        return $this->setData(self::WIND_SPEED, $windSpeed);
    }

    public function getWindSpeed()
    {
        return $this->getData(self::WIND_SPEED);
    }

    public function setSunrise(string $sunrise)
    {
        return $this->setData(self::SUNRISE, $sunrise);
    }

    public function getSunrise()
    {
        return $this->getData(self::SUNRISE);
    }

    public function setSunset(string $sunset)
    {
        return $this->setData(self::SUNSET, $sunset);
    }

    public function getSunset()
    {
       return $this->getData(self::SUNSET);
    }
}
