<?php


namespace Magenest\Movie\Block;

use Magento\Backend\Block\Template;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;


/**
 * Class CustomerAccount
 * @package Magenest\Movie\Block
 */
class CustomerAccount extends Template
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;
    /**
     * @var Session
     */
    private $customerSession;
    /**
     * @var \Magento\Catalog\Model\Product\Image\UrlBuilder
     */
    private $urlBuilder;

    /**
     * CustomerAccount constructor.
     * @param Template\Context $context
     * @param Session $customerSession
     * @param CustomerRepositoryInterface $customerRepository
     * @param \Magento\Catalog\Model\Product\Image\UrlBuilder $urlBuilder
     */
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

    /**
     * @return \Magento\Customer\Api\Data\CustomerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCustomer()
    {
        return $this->customerRepository->getById($this->customerSession->getCustomerId());
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAvatar()
    {
        $pathImage = $this->urlBuilder->getUrl($this->customerRepository->getById($this->customerSession->getCustomerId())->getCustomAttribute('avatar')->getValue(), "product_base_image");
        return $pathImage;
    }
}
