<?php


namespace Magenest\Movie\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Framework\App\ResourceConnection;

/**
 * Class DataPageReport
 * @package Magenest\Movie\Block\Adminhtml
 */
class DataPageReport extends Template
{
    /**
     * @var ResourceConnection
     */
    protected $resourceConnection;

    /**
     * DataPageReport constructor.
     * @param Template\Context $context
     * @param array $data
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(Template\Context $context,
                                array $data = [],
                                ResourceConnection $resourceConnection)
    {
        $this->resourceConnection = $resourceConnection;

        parent::__construct($context, $data);
    }


    /**
     * @param $tablename
     * @return int|void
     */
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
