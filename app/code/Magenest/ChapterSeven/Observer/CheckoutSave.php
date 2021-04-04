<?php


namespace Magenest\ChapterSeven\Observer;


use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class CheckoutSave
 * @package Magenest\ChapterSeven\Observer
 */
class CheckoutSave implements ObserverInterface
{
    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * @param RequestInterface $request
     */
    public function __construct(
        RequestInterface $request
    )
    {
        $this->_request = $request;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $date = date('d-m-Y h:i:sa');
        $timestamp = strtotime($date);
        if ($this->_request->getFullActionName() == 'checkout_cart_add') { //checking when product is adding to cart
            $product = $observer->getProduct();
            $additionalOptions = [];
            $additionalOptions[] = array(
                'label' => "Timestamp",
                'value' => $timestamp,
            );
            $product->addCustomOption('additional_options', json_encode($additionalOptions));
        }
    }
}
