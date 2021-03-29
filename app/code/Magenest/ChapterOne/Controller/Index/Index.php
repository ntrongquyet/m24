<?php


namespace Magenest\ChapterOne\Controller\Index;

use Magenest\ChapterOne\Model\ResoucreModel\Rules\CollectionFactory as RulesCollectionFactory;
use Magenest\ChapterOne\Model\RulesFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $rulesFactory;
    protected $pageFactory;
    protected $collectionFactory;

    public function __construct(Context $context,
                                RulesFactory $rulesFactory,
                                PageFactory $pageFactory,
                                RulesCollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->pageFactory = $pageFactory;
        $this->rulesFactory = $rulesFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->pageFactory->create();
        $item = $this->rulesFactory->create()->load(1);
        $this->collectionFactory->create()->getItems();
        return $result;
    }
}
