<?php


namespace Magenest\Movie\Model\ResourceModel\Director;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class DirectorCollection extends AbstractCollection
{
    protected $_idFieldName = "direction_id";

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Director', 'Magenest\Movie\Model\ResourceModel\Director');
    }
}
