<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Magenest\Movie\Controller\Adminhtml\Movie
 */
class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $_pageResultFactory;

    /**
     * Index constructor.
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
        $result = $this->_pageResultFactory->create();
        $result->getConfig()->getTitle()->prepend(__("Movie Grid"));
        return $result;
    }
}
