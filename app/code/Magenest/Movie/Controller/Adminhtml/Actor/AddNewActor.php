<?php


namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class AddNewActor
 * @package Magenest\Movie\Controller\Adminhtml\Actor
 */
class AddNewActor extends Action
{

    /**
     * @var PageFactory
     */
    protected $_pageResultFactory;

    /**
     * AddNewActor constructor.
     * @param Context $context
     * @param PageFactory $_pageResultFactory
     */
    public function __construct(Context $context, PageFactory $_pageResultFactory)
    {
        $this->_pageResultFactory = $_pageResultFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_pageResultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Actor'));
        return $resultPage;

    }
}
