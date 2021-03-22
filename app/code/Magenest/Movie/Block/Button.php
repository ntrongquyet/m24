<?php


namespace Magenest\Movie\Block;

use Magento\Config\Block\System\Config\Form\Field;

class Button extends Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return '<button onclick="window.location.reload();" type="button">' . __('Reload') . '</button>';

    }
}
