<?php


namespace Magenest\Movie\Block;

use Magento\Backend\Block\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class WidgetSample
 * @package Magenest\Movie\Block
 */
class WidgetSample extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/widget_sample.phtml";
}
