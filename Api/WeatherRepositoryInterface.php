<?php

namespace Achi\WeatherApp\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Achi\WeatherApp\Api\Data\WeatherInterface;

interface WeatherRepositoryInterface
{
    /**
     * @param int $id
     * @return \Achi\WeatherApp\Api\Data\WeatherInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($id);
 
    /**
     * @param \Achi\WeatherApp\Api\Data\WeatherInterface $weather
     * @return \Achi\WeatherApp\Api\Data\WeatherInterface
     */
    public function save(WeatherInterface $weather);
 
    /**
     * @param \Achi\WeatherApp\Api\Data\WeatherInterface $weather
     * @return void
     */
   public function delete(WeatherInterface $weather);
 
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Achi\WeatherApp\Api\Data\WeatherSearchResultInterface
     */
   public function getList(SearchCriteriaInterface $searchCriteria);
}
