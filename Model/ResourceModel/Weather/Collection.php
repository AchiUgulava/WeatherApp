<?php

namespace Achi\WeatherApp\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Achi\WeatherApp\Model\Weather as WeatherModel;
use Achi\WeatherApp\Model\ResourceModel\Weather as WeatherResourceModel;

class Collection extends AbstractCollection
{
     /**
     * @var string
     */
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'weather_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(WeatherModel::class, WeatherResourceModel::class);
    }
}
