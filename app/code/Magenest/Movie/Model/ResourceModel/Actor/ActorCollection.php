<?php


namespace Magenest\Movie\Model\ResourceModel\Actor;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ActorCollection extends AbstractCollection
{
    protected $_idFieldName = "actor_id";
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Actor', 'Magenest\Movie\Model\ResourceModel\Actor');
    }
}
