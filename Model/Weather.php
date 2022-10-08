<?php
 
namespace Achi\Model\Model;
 
use Magento\Framework\Model\AbstractModel;
use Dolphin\MyModule\Model\ResourceModel\Weather as WeatherResourceModel;
 
class Weather extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(WeatherResourceModel::class);
    }
}