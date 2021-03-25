<?php


namespace Magenest\Movie\Block;

use Magento\Backend\Block\Template;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;


class CustomerAccount extends Template
{
    private $customerRepository;
    private $customerSession;
    private $urlBuilder;

    public function __construct(Template\Context $context,
                                Session $customerSession,
                                CustomerRepositoryInterface $customerRepository,
                                \Magento\Catalog\Model\Product\Image\UrlBuilder $urlBuilder)
    {
        $this->customerRepository = $customerRepository;
        $this->customerSession = $customerSession;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function getCustomer()
    {
        return $this->customerRepository->getById($this->customerSession->getCustomerId());
    }

    public function getAvatar()
    {
        $pathImage = $this->urlBuilder->getUrl($this->customerRepository->getById($this->customerSession->getCustomerId())->getCustomAttribute('avatar')->getValue(), "product_base_image");
        return $pathImage;
    }
}
