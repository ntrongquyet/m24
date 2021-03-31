<?php


namespace Magenest\ChapterOne\Controller\Index;

use Magenest\ChapterOne\Model\ResoucreModel\Rules\CollectionFactory as RulesCollectionFactory;
use Magenest\ChapterOne\Model\RulesFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Magenest\ChapterOne\Controller\Index
 */
class Index extends Action
{
    /**
     * @var RulesFactory
     */
    protected $rulesFactory;
    /**
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * @var RulesCollectionFactory
     */
    protected $collectionFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param RulesFactory $rulesFactory
     * @param PageFactory $pageFactory
     * @param RulesCollectionFactory $collectionFactory
     */
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

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $result = $this->pageFactory->create();
        $item = $this->rulesFactory->create()->load(1);
        $this->collectionFactory->create()->getItems();
        return $result;
    }
}
