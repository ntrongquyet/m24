<?php


namespace Magenest\ChapterTwo\Block\Adminhtml;


use Magenest\ChapterTwo\Block\Adminhtml\Form\Field\ClockType as ClockTypeOptions;
use Magenest\ChapterTwo\Block\Adminhtml\Form\Field\CustomerType;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

/**
 * Class ClockType
 * @package Magenest\ChapterTwo\Block\Adminhtml
 */
class ClockType extends AbstractFieldArray
{
    /**
     * Tạo option cho select trong dynamic row
     * @var
     */
    private $dropdownCustomerGroup;
    /**
     * Tạo option cho select trong dynamic row
     * @var
     */
    private $dropdownClockType;

    /**
     * Tạo label và định nghĩa đầu vào của dữ liệu
     */
    protected function _prepareToRender()
    {
        $this->addColumn('customer_type', [
            'label' => __('Customer Type'),
            'renderer' => $this->getDropdownRenderer('CustomerType')

        ]);
        $this->addColumn('clock_type_options', [
            'label' => __('Clock Type'),
            'renderer' => $this->getDropdownRenderer('ClockType')
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * @param $className
     * @return ClockTypeOptions|CustomerType|\Magento\Framework\View\Element\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getDropdownRenderer($className)
    {
        if ($className == "CustomerType") {
            if (!$this->dropdownCustomerGroup) {
                $this->dropdownCustomerGroup = $this->getLayout()->createBlock(
                    CustomerType::class,
                    '',
                    ['data' => ['is_render_to_js_template' => true]]);
            }
            return $this->dropdownCustomerGroup;

        } else {
            if (!$this->dropdownClockType) {
                $this->dropdownClockType = $this->getLayout()->createBlock(
                    ClockTypeOptions::class, '',
                    ['data' => ['is_render_to_js_template' => true]]);
            }
            return $this->dropdownClockType;

        }
    }

    /**
     * @param DataObject $row
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $options = [];
        $dropdownField = $row->getDropdownField();
        if ($dropdownField !== null) {
            $options['option_' . $this->getDropdownRenderer()->calcOptionHash($dropdownField)] = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }
}
