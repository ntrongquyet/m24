<?php

namespace Magenest\ChapterOne\Model;


use Magento\Framework\Model\AbstractModel;

/**
 * Class Rules
 * @package Magenest\ChapterOne\Model
 */
class Rules extends AbstractModel
{
    /**
     * Tạo eventPrefix để sử dụng một số event dành cho model
     * @var string
     */
    protected $_eventPrefix = 'rules';

    /**
     * Khởi tạo model
     */
    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\ResoucreModel\Rules');
    }
}
