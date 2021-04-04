<?php


namespace Magenest\ChapterOne\Observer;


use Magenest\ChapterOne\Model\ResoucreModel\Rules as RulesResouceModel;
use Magenest\ChapterOne\Model\RuleRepository;
use Magenest\ChapterOne\Model\RulesFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Event\Observer;

/**
 * Class RulesSaveChapter
 * @package Magenest\ChapterOne\Observer
 */
class RulesSaveChapter implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @var RuleRepository
     */
    protected $rulesRepository;
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
     * RulesSaveChapter constructor.
     * @param RulesFactory $rulesFactory
     * @param RulesResouceModel $rulesResourceModel
     * @param ResourceConnection $resourceConection
     */
    public function __construct(RulesFactory $rulesFactory,
                                RulesResouceModel $rulesResourceModel,
                                ResourceConnection $resourceConection,
                                RuleRepository $ruleRepository)
    {
        $this->rulesRepository = $ruleRepository;
        $this->rulesFactory = $rulesFactory->create();
        $this->rulesResourceModel = $rulesResourceModel;
        $this->resourceConection = $resourceConection;
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
        $sql = "UPDATE " . $tableName . " SET afterSave = '" . $created_date . "' WHERE id = " . $id;
        $connection->query($sql);

    }
}
