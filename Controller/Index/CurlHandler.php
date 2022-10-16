<?php

namespace Achi\WeatherApp\Controller\Index;


use Magento\Framework\App\Action\Action as ParentAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Achi\WeatherApp\Api\Data\WeatherInterfaceFactory;
use Achi\WeatherApp\Api\Data\WeatherInterface;
use Achi\WeatherApp\Api\WeatherRepositoryInterface;
use Magento\Framework\Serialize\Serializer\Json;


class CurlHandler extends ParentAction implements HttpGetActionInterface, HttpPostActionInterface
{

    protected $curl;

    protected $weatherInterface;

    private $weatherInterfaceFactory;

    protected $WeatherRepositoryInterface;

    protected $json;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        WeatherInterface $weatherInterface,
        WeatherInterfaceFactory $weatherInterfaceFactory,
        WeatherRepositoryInterface $WeatherRepositoryInterface,
        Curl $curl,
        Json $json
    ) {
        $this->curl = $curl;
        $this->weatherInterface = $weatherInterface;
        $this->weatherInterfaceFactory = $weatherInterfaceFactory;
        $this->WeatherRepositoryInterface = $WeatherRepositoryInterface;
        $this->DataPersistorInterface = $dataPersistor;
        $this->json = $json;
        parent::__construct($context);
    }
    public function extractData(array $apiResult)
    {
        $temperatureData = $apiResult['main'];
        $sysData = $apiResult['sys'];

        return [
            WeatherInterface::COUNTRY => $sysData['country'],
            WeatherInterface::SUNRISE => $sysData['sunrise'],
            WeatherInterface::SUNSET => $sysData['sunset'],
            WeatherInterface::TEMPERATURE => $temperatureData['temp'],
            WeatherInterface::FEELS_LIKE => $temperatureData['feels_like'],
            WeatherInterface::PRESSURE => $temperatureData['pressure'],
            WeatherInterface::HUMIDITY => $temperatureData['humidity'],
            WeatherInterface::WIND_SPEED => $apiResult['wind']['speed'],
            WeatherInterface::CITY => $apiResult['name'],
            WeatherInterface::DESCRIPTION => $apiResult['weather'][0]['description']
        ];
    }

    public function execute()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {

            $json = $request->getParam('weather_data');

            if ((int)$json['cod'] === 200) {

                $weatherData = $this->extractData($json);

                $openWeather = $this->weatherInterfaceFactory->create();

                foreach ($weatherData as $key => $value) {

                    $openWeather->setData($key, $value);

                    $this->DataPersistorInterface->set($key, $value);
                }

                $this->WeatherRepositoryInterface->save($openWeather);
            }
        }
    }
}
