<?php

namespace Magenest\ChapterOne\Setup;

use Magenest\ChapterOne\Model\ResoucreModel\Rules\CollectionFactory as RulesCollectionFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Setup\Exception;

/**
 * Class UpgradeData
 * @package Magenest\ChapterOne\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var \Magenest\ChapterOne\Model\RulesFactory
     */
    protected $rulesFactory;
    /**
     * @var RulesCollectionFactory
     */
    protected $collection;
    /**
     * @var string
     */
    protected $magentoVersion;

    /**
     * UpgradeData constructor.
     * @param \Magenest\ChapterOne\Model\RulesFactory $rulesFactory
     * @param RulesCollectionFactory $collection
     */
    public function __construct(\Magenest\ChapterOne\Model\RulesFactory $rulesFactory,
                                RulesCollectionFactory $collection)
    {
        $this->collection = $collection;
        $this->rulesFactory = $rulesFactory;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productMetadata = $objectManager->get('Magento\Framework\App\ProductMetadataInterface');
        $this->magentoVersion = $productMetadata->getVersion();
    }


    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(),
                '1.0.7') < 0) {
            $items = $this->collection->create();
            foreach ($items as $item) {
                $data = $item->getData('conditions_serialized');
                $id = $item->getData('id');
                $thisItem = $this->rulesFactory->create()->load($id);
                if ($this->magentoVersion < 2.2) {
                    try {
                        if (json_decode($data)) {
                            $data = serialize($data);
                        }
                    } catch (Exception $exception) {
                        echo $exception;
                    }
                } else {
                    try {
                        if (!json_decode($data)) {
                            $data = unserialize($data);
                        }
                    } catch (Exception $exception) {
                        echo $exception;
                    }

                }
                $thisItem->setData('conditions_serialized', $data);
                $thisItem->save();
            }
        }
    }
}
