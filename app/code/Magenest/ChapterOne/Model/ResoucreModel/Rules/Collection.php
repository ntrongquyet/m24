<?php


namespace Magenest\ChapterOne\Model\ResoucreModel\Rules;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Magenest\ChapterOne\Model\ResoucreModel\Rules
 */
class Collection extends AbstractCollection
{
    /**
     * Khóa chính của model
     * @var string
     */
    protected $_idFieldName = "id";

    /**
     * Kết nối resource model và model
     */
    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\Rules', 'Magenest\ChapterOne\Model\ResoucreModel\Rules');
    }
}
