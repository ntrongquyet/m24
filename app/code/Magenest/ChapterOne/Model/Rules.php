<?php

namespace Magenest\ChapterOne\Model;


use Magento\Framework\Model\AbstractModel;

class Rules extends AbstractModel
{
    protected $_eventPrefix = 'rules';
    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\ResoucreModel\Rules');
    }
}
