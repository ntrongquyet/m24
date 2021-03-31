<?php


namespace Magenest\ChapterFour\Setup\Patch\Data;


namespace Magenest\ChapterFour\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddAttributeToProduct
 * @package Magenest\ChapterFour\Setup\Patch\Data
 */
class AddAttributeToProduct implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddAttributeToProduct constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup,
                                EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }


    /**
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @return AddAttributeToProduct|void
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'date_picker', [
            'type' => 'datetime',
            'backend' => '',
            'frontend' => '',
            'label' => 'Date Select',
            'input' => 'date',
            'class' => '',
            'source' => '',
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => true,
            'user_defined' => true,
            'group' => 'general',
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => true,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => ''
        ]);
    }
}
