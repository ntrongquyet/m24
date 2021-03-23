<?php


namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class AddNewActor extends Action
{

    protected $_pageResultFactory;

    public function __construct(Context $context, PageFactory $_pageResultFactory)
    {
        $this->_pageResultFactory = $_pageResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageResultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Actor'));
        return $resultPage;

    }
}
