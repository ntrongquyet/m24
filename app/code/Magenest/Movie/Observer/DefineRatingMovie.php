<?php


namespace Magenest\Movie\Observer;


use Magenest\Movie\Model\ResourceModel\Movie as MovieResoureModel;
use Magento\Framework\Event\Observer;

/**
 * Class DefineRatingMovie
 * @package Magenest\Movie\Observer
 */
class DefineRatingMovie implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var MovieResoureModel
     */
    protected $_movieResoureModel;

    /**
     * DefineRatingMovie constructor.
     * @param MovieResoureModel $movieResoureModel
     */
    public function __construct(MovieResoureModel $movieResoureModel)
    {
        $this->_movieResoureModel = $movieResoureModel;
    }

    /**
     * @param Observer $observer
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute(Observer $observer)
    {
        $data = $observer->getData('movie');
        $data->setData('rating', 0);
        $this->_movieResoureModel->save($data);
        // TODO: Implement execute() method.
    }
}
