<?php


namespace Magenest\Movie\Observer;


use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;

/**
 * Class ChangeFirstNameCustomer
 * @package Magenest\Movie\Observer
 */
class ChangeFirstNameCustomer implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $_customerRepository;

    /**
     * ChangeFirstNameCustomer constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->_customerRepository = $customerRepository;
    }

    /**
     * @param Observer $observer
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\State\InputMismatchException
     */
    public function execute(Observer $observer)
    {
        $data = $observer->getData('customer');
        $data->setData('firstname', 'Magenest');
        $this->_customerRepository->save($data);
    }
}
