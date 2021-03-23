<?php


namespace Magenest\Movie\Observer;


use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;

class ChangeFirstNameCustomer implements \Magento\Framework\Event\ObserverInterface
{
    protected $_customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->_customerRepository = $customerRepository;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getData('customer');
        $data->setData('firstname', 'Magenest');
        $this->_customerRepository->save($data);
    }
}
