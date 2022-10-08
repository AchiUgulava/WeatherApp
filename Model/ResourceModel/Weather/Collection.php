<?php
 
namespace Achi\WeatherApp\Model\Weather;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Achi\WeatherApp\Model\Weather as WeatherModel;
use Achi\WeatherApp\Model\ResourceModel\Weather as WeatherResourceModel;
 
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(WeatherModel::class, WeatherResourceModel::class);
    }
}
