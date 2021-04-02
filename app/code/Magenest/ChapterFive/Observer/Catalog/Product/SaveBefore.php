<?php


namespace Magenest\ChapterFive\Observer\Catalog\Product;


use Magento\Framework\Event\Observer;

/**
 * Class SaveBefore
 * @package Magenest\ChapterFive\Observer\Catalog\Product
 */
class SaveBefore implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $oldText = $observer->getData()['product']->getData('text_varchar');
        $observer->getData()['product']->setData('text_varchar', $oldText . ' ' . strlen($oldText));
    }
}
