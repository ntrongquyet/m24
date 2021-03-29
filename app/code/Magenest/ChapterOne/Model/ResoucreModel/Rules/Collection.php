<?php


namespace Magenest\ChapterOne\Model\ResoucreModel\Rules;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = "id";
    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\Rules', 'Magenest\ChapterOne\Model\ResoucreModel\Rules');
    }
}
