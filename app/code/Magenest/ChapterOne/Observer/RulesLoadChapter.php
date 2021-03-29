<?php


namespace Magenest\ChapterOne\Observer;


use Magenest\ChapterOne\Model\ResoucreModel\Rules as RulesResouceModel;
use Magenest\ChapterOne\Model\RulesFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Event\Observer;

/**
 * Class RulesLoadChapter
 * @package Magenest\ChapterOne\Observer
 */
class RulesLoadChapter implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magenest\ChapterOne\Model\Rules
     */
    protected $rulesFactory;
    /**
     * @var RulesResouceModel
     */
    protected $rulesResourceModel;
    /**
     * @var ResourceConnection
     */
    protected $resourceConection;

    /**
     * RulesLoadChapter constructor.
     * @param RulesFactory $rulesFactory
     * @param RulesResouceModel $rulesResourceModel
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(RulesFactory $rulesFactory,
                                RulesResouceModel $rulesResourceModel,
                                ResourceConnection $resourceConnection)
    {
        $this->resourceConection = $resourceConnection;
        $this->rulesFactory = $rulesFactory->create();
        $this->rulesResourceModel = $rulesResourceModel;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $created_date = date("Y-m-d H:i:s");
        $data = $observer->getData('data_object');
        $id = $data->getData('id');

        $connection = $this->resourceConection->getConnection();
        $tableName = $this->resourceConection->getTableName('magenest_rules');
        $where = ['id = ?' => (int)$id];
        $sql = "UPDATE " . $tableName . " SET afterLoad = '" . $created_date . "' WHERE id = " . $id;
        $connection->query($sql);
    }
}
