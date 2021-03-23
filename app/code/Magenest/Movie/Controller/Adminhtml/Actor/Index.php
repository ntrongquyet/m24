<?php


namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    protected $_pageResultFactory;

    public function __construct(Context $context, PageFactory $_pageResultFactory)
    {
        $this->_pageResultFactory = $_pageResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->_pageResultFactory->create();
        $result->getConfig()->getTitle()->prepend(__("Actor Grid"));
        return $result;
    }
}
