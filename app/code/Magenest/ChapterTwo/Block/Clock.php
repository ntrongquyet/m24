<?php


namespace Magenest\ChapterTwo\Block;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

/**
 * Class Clock
 * @package Magenest\ChapterTwo\Block
 */
class Clock extends Template
{

    /**
     * path title in core_config_data of clock
     */
    const TITTLE = 'mgn_ctw_section/general/title_clock';
    /**
     * path size in core_config_data of clock
     */
    const SIZE = 'mgn_ctw_section/general/size_clock';
    /**
     * path color clock in core_config_data of clock
     */
    const COLOR_CLOCK = 'mgn_ctw_section/general/color_clock';
    /**
     * path color text in core_config_data of clock
     */
    const COLOR_TEXT = 'mgn_ctw_section/general/color_text';
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Clock constructor.
     * @param Template\Context $context
     * @param array $data
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(Template\Context $context, array $data = [],
                                ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        return $this->scopeConfig->getValue(self::TITTLE, $storeScope);

    }

    /**
     * @return mixed
     */
    public function getColorText()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        return $this->scopeConfig->getValue(self::COLOR_TEXT, $storeScope);

    }

    /**
     * @return mixed
     */
    public function getColorClock()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        return $this->scopeConfig->getValue(self::COLOR_CLOCK, $storeScope);

    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        return $this->scopeConfig->getValue(self::SIZE, $storeScope);

    }
}
