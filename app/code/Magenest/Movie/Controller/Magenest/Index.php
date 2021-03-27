<?php


namespace Magenest\Movie\Controller\Magenest;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Magenest\Movie\Controller\Magenest
 */
class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $pageResultFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageResultFactory
     */
    public function __construct(Context $context, PageFactory $pageResultFactory)
    {
        $this->pageResultFactory = $pageResultFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageResultFactory->create();
    }
}
