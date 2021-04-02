<?php


namespace Magenest\ChapterFive\Model\Config\Source;

use Magento\Framework\App\ResourceConnection;


class CustomerTypeOptions extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $resourceConnection;

    public function __construct(ResourceConnection $resourceConnection)
    {
        $this->resourceConnection = $resourceConnection;

    }

    public function getAllOptions()
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('customer_group');
        $sql = "SELECT * FROM " . $tableName;
        $result = $connection->query($sql);
        $arr = [];
        foreach ($result as $item) {
            if (empty($arr)) {
                $arr = [["value" => $item['customer_group_id'], "label" => $item['customer_group_code']]];

            } else {
                array_push($arr, ["value" => $item['customer_group_id'], "label" => $item['customer_group_code']]);
            }
        }
        return $arr;
    }
    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }
}
