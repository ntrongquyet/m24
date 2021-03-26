<?php


namespace Magenest\Movie\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Framework\App\ResourceConnection;

class DataPageReport extends Template
{
    protected $resourceConnection;

    public function __construct(Template\Context $context,
                                array $data = [],
                                ResourceConnection $resourceConnection)
    {
        $this->resourceConnection = $resourceConnection;

        parent::__construct($context, $data);
    }



    public function getAmountRecordTable($tablename)
    {
        $connection = $this->resourceConnection->getConnection();
        $select = $connection->select();
        $tableName = $this->resourceConnection->getTableName($tablename);
        $sql = "Select * FROM " . $tableName;
        $result = $connection->fetchAll($sql);
        return count($result); // gives associated array, table fields as key in array.

    }

}
