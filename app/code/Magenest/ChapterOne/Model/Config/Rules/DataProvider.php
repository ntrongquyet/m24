<?php


namespace Magenest\ChapterOne\Model\Config\Rules;

use Magenest\ChapterOne\Model\ResoucreModel\Rules\CollectionFactory as RulesCollectionFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    protected $_loadeData;
    protected $_collection;

    public function __construct($name, $primaryFieldName,
                                $requestFieldName,
                                ReportingInterface $reporting,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                RequestInterface $request,
                                FilterBuilder $filterBuilder,
                                array $meta = [], array $data = [],
                                RulesCollectionFactory $_collection)
    {
        $this->_collection = $_collection;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $reporting, $searchCriteriaBuilder, $request, $filterBuilder, $meta, $data);
    }

    public function getData()
    {
        $this->_loadeData = [];
        if (isset($this->_loadeData)) {
            return $this->_loadeData;
        }
        $items = $this->_collection->getItems();
        foreach ($items as $item) {
            $this->_loadeData[$item->getData('id')] = $item->getData();
        }
        return $this->_loadeData;
    }
}
