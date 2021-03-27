<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class AddNewMovie
 * @package Magenest\Movie\Controller\Adminhtml\Movie
 */
class AddNewMovie extends Action
{

    /**
     * @var PageFactory
     */
    protected $_pageResultFactory;

    /**
     * AddNewMovie constructor.
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
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Movie'));
        return $resultPage;

    }
}
