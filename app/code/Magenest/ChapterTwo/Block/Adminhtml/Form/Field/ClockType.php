<?php


namespace Magenest\ChapterTwo\Block\Adminhtml\Form\Field;


use Magento\Framework\View\Element\Html\Select;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ClockType
 * @package Magenest\ChapterTwo\Block\Adminhtml\Form\Field
 */
class ClockType extends Select
{

    /**
     * ClockType constructor.
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    /**
     * @return \string[][]
     */
    private function getSourceOptions()
    {

        return [
            ['label' => 'Type 1', 'value' => '1'],
            ['label' => 'Type 2', 'value' => '2'],
            ['label' => 'Type 3', 'value' => '3'],
        ];
    }
}
