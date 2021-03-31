<?php


namespace Magenest\ChapterTwo\Block\Adminhtml\Form\Field;


use Magento\Framework\App\ResourceConnection;
use Magento\Framework\View\Element\Html\Select;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class CustomerType
 * @package Magenest\ChapterTwo\Block\Adminhtml\Form\Field
 */
class CustomerType extends Select
{
    /**
     * @var ResourceConnection
     */
    protected $resouceConnection;

    /**
     * CustomerType constructor.
     * @param Context $context
     * @param array $data
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(Context $context, array $data = [],
                                ResourceConnection $resourceConnection)
    {
        $this->resouceConnection = $resourceConnection;
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
     * @return array|array[]
     */
    private function getSourceOptions()
    {
        $connection = $this->resouceConnection->getConnection();
        $tableName = $this->resouceConnection->getTableName('customer_group');
        $sql = "SELECT * FROM " . $tableName;
        $result = $connection->query($sql);
        $arr = [];
        foreach ($result as $item) {
            if (empty($arr)) {
                $arr = [["value" => $item['customer_group_id'], "label" => $item['customer_group_code']]];

            } else {
                array_push($arr, ["value" => $item['customer_group_id'], "label" => $item['customer_group_code']]);
            }
        }
        return $arr;
    }
}
