<?php

namespace Achi\weatherApp\Model;

use Achi\WeatherApp\Api\Data\WeatherInterface;
use Achi\WeatherApp\Api\Data\WeatherInterfaceFactory;
use Achi\WeatherApp\Api\WeatherRepositoryInterface;
use Achi\WeatherApp\Model\ResourceModel\Weather;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Achi\WeatherApp\Model\ResourceModel\Weather\CollectionFactory;
use Achi\WeatherApp\Model\WeatherFactory;


class WeatherRepository implements WeatherRepositoryInterface
{
    protected $resource;

    protected $weatherFactory;

    protected $searchResultsFactory;

    protected $WeatherCollectionFactory;

    public function __construct(
        Weather $resource,
        WeatherFactory $weatherFactory,
        SearchResultsInterface $searchResultsFactory,
        CollectionFactory $WeatherCollectionFactory)
    {
        $this->resource=$resource;

        $this->weatherFactory=$weatherFactory;

        $this->searchResultsFactory = $searchResultsFactory;

        $this->WeatherCollectionFactory = $WeatherCollectionFactory;

    }

    public function save(WeatherInterface $weather)
    {
        $this->resource->save($weather);
        return $weather;
    }

    public function get($weatherId)
    {
        $weather = $this->weatherFactory->create();
        $this->resource->load($weather, $weatherId);
        return $weather;
    }

    public function getList($searchCriteria)
    {
        $searchResults = $this->searchResultsFactory;
        $searchResults->setSearchCriteria($searchCriteria);
        $collection = $this->WeatherCollectionFactory->create();
        return $collection;

    }

    public function delete(WeatherInterface $weather)
    {
        $this->resource->delete($weather);
    }

    public function deleteById($weatherId)
    {
        $this->delete($this->get($weatherId));
    }
}
