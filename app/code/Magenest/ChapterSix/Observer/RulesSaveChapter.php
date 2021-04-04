<?php


namespace Magenest\ChapterSix\Observer;

use Magenest\ChapterOne\Model\RuleRepository;
use Magento\Framework\Event\Observer;

class RulesSaveChapter implements \Magento\Framework\Event\ObserverInterface
{
    protected $ruleRepository;

    public function __construct(RuleRepository $ruleRepository)
    {
        $this->ruleRepository = $ruleRepository;
    }

    public function execute(Observer $observer)
    {
        $data = $observer->getData('data_object');
        $data->setData("status", "Pending");
        $id = $data->getData('id');
    }
}
