<?php


namespace Magenest\Movie\Block;

use Magento\Config\Block\System\Config\Form\Field;

/**
 * Class Button
 * @package Magenest\Movie\Block
 */
class Button extends Field
{
    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return '<button onclick="window.location.reload();" type="button">' . __('Reload') . '</button>';

    }
}
