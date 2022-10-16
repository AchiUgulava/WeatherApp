<?php

namespace Achi\WeatherApp\Block;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\Element\Template;
use Achi\WeatherApp\Api\Data\WeatherInterface;
use Achi\WeatherApp\Model\ResourceModel\Weather\CollectionFactory;


class Index extends Template
{
    protected $WeatherCollectionFactory;
    /**
     * @var WeatherInterface
     */
    private $WeatherInterface;

    public function __construct(
        Template\Context $context,
        WeatherInterface $WeatherInterface,
        DataPersistorInterface $dataPersistor,
        CollectionFactory $WeatherCollectionFactory,
        array $data = [])
    {
        $this->WeatherInterface=$WeatherInterface;
        $this->WeatherCollectionFactory = $WeatherCollectionFactory;
        $this->DataPersistorInterface=$dataPersistor;
        parent::__construct($context, $data);
    }


    public function getCity()
    {
        $city = $this->DataPersistorInterface->get('city');
        $this->DataPersistorInterface->clear('city');
        return $city;
    }

    public function getCountry()
    {
        $country = $this->DataPersistorInterface->get('Country');
        $this->DataPersistorInterface->clear('Country');
        return $country;
    }

    public function getDescription()
    {
        $description = $this->DataPersistorInterface->get('description');
        $this->DataPersistorInterface->clear('description');
        return $description;
    }

    public function getTemperature()
    {
        $temperature = $this->DataPersistorInterface->get('temperature');
        $this->DataPersistorInterface->clear('temperature');
        return $temperature;
    }

    public function getFeelsLike()
    {
        $feelsLike = $this->DataPersistorInterface->get('feels like');
        $this->DataPersistorInterface->clear('feels like');
        return $feelsLike;
    }

    public function getPressure()
    {
        $pressure = $this->DataPersistorInterface->get('pressure');
        $this->DataPersistorInterface->clear('pressure');
        return $pressure;
    }

    public function getHumidity()
    {
        $humidity = $this->DataPersistorInterface->get('humidity');
        $this->DataPersistorInterface->clear('humidity');
        return $humidity;
    }

    public function getWindSpeed()
    {
        $windSpeed = $this->DataPersistorInterface->get('wind speed');
        $this->DataPersistorInterface->clear('wind speed');
        return $windSpeed;
    }

    public function getSunrise()
    {
        $sunrise = $this->DataPersistorInterface->get('sunrise');
        $this->DataPersistorInterface->clear('sunrise');
        if ($sunrise)
        {
            return date('m/d/Y H:i:s', $sunrise);
        }
        return null;
    }

    public function getSunset()
    {
        $sunset = $this->DataPersistorInterface->get('sunset');
        $this->DataPersistorInterface->clear('sunset');
        if ($sunset)
        {
            return date('m/d/Y H:i:s', $sunset);
        }
        return null;
    }

    public function getWeatheCollection()
    {
        return $this->WeatherCollectionFactory->create();
    }

}
