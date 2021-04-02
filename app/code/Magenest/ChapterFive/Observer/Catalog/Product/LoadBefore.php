<?php


namespace Magenest\ChapterFive\Observer\Catalog\Product;


use Magento\Framework\Event\Observer;

/**
 * Class LoadBefore
 * @package Magenest\ChapterFive\Observer\Catalog\Product
 */
class LoadBefore implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $oldText = $observer->getData()['product']->getData('text_varchar');
        $theLastSpace = strpos($oldText, ' ');
        $newText = substr($oldText, 0, $theLastSpace);
        $observer->getData()['product']->setData('text_varchar', $newText);
    }
}
