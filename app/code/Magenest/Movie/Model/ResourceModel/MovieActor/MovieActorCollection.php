<?php


namespace Magenest\Movie\Model\ResourceModel\MovieActor;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class MovieActorCollection extends AbstractCollection
{
    protected $_idFieldName = "actor_id";

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\MovieActor', 'Magenest\Movie\Model\ResourceModel\MovieActor');
    }
}
