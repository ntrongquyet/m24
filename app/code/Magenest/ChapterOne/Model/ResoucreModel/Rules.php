<?php


namespace Magenest\ChapterOne\Model\ResoucreModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Rules extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('magenest_rules','id');
    }
}
