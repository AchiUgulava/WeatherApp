<?php

namespace Achi\WeatherApp\Block;

use Magento\Framework\View\Element\Template;
use Achi\WeatherApp\Model\WeatherFactory;
 
class Index extends Template
{
    protected $_weatherFactory;
 
    public function __construct(
        Template\Context $context,
        WeatherFactory $weatherFactory
    ) {
        parent::__construct($context);
        $this->_weatherFactory = $weatherFactory;
    }
    public function execute()
    {
         return $this->_pageFactory->create();
    }
    public function data()
    {
        $weather = $this->_weatherFactory->create();
        $collection = $weather->getCollection();
        return $collection;
    }
}