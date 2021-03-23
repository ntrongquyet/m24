<?php


namespace Magenest\Movie\Observer;


use Magenest\Movie\Model\ResourceModel\Movie as MovieResoureModel;
use Magento\Framework\Event\Observer;

class DefineRatingMovie implements \Magento\Framework\Event\ObserverInterface
{
    protected $_movieResoureModel;

    public function __construct(MovieResoureModel $movieResoureModel)
    {
        $this->_movieResoureModel = $movieResoureModel;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getData('movie');
        $data->setData('rating', 0);
        $this->_movieResoureModel->save($data);
        // TODO: Implement execute() method.
    }
}
