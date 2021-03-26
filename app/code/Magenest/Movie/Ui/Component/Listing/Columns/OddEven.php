<?php


namespace Magenest\Movie\Ui\Component\Listing\Columns;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Ui\Component\Listing\Columns\Column;


class OddEven extends Column
{
    protected $_orderRepository;
    protected $_searchCriteria;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, OrderRepositoryInterface $orderRepository, SearchCriteriaBuilder $criteria, array $components = [], array $data = [])
    {
        $this->_orderRepository = $orderRepository;
        $this->_searchCriteria = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);

    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                $order = $this->_orderRepository->get($item["entity_id"]);
                $status = $order->getData("odd_even");
                $value = "";
                $class = "";
                if ((int)$item["entity_id"] % 2 == 0) {
                    $value = "EVEN";
                    $class = 'grid-severity-notice';
                } else {
                    $value = "ODD";
                    $class = 'grid-severity-minor';
                }
                $odd_even = '<span class="' . $class . '"><span>' . $value . '</span></span>';
                // $this->getData('name') returns the name of the column so in this case it would return export_status
                $item[$this->getData('name')] = $odd_even;
            }
        }

        return $dataSource;
    }
}
