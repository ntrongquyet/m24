<?php


namespace Magenest\ChapterFive\Plugin;

/**
 * Class Columns
 * @package Magenest\ChapterFive\Plugin
 */
class Columns extends \Magento\Catalog\Ui\Component\Listing\Columns
{
    /**
     * Preference class prepare to show/hide column with condition
     */
    public function prepare()
    {

        // Get current user
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $extensionUser = $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser();


        $pattern = "/^[a-mA-M]$/";
        $columnSortOrder = self::DEFAULT_COLUMNS_MAX_ORDER;
        foreach ($this->attributeRepository->getList() as $attribute) {
            $config = [];
            if (!isset($this->components[$attribute->getAttributeCode()])) {

                $config['sortOrder'] = ++$columnSortOrder;
                if ($attribute->getIsFilterableInGrid()) {
                    $config['filter'] = $this->getFilterType($attribute->getFrontendInput());
                }
                $column = $this->columnFactory->create($attribute, $this->getContext(), $config);
                $column->prepare();
                $this->addComponent($attribute->getAttributeCode(), $column);
            }
        }
        parent::prepare();
        if (preg_match($pattern, substr($extensionUser->getData('firstname'), 0, 1))) {
            $this->components['text_varchar']->_data['config']['componentDisabled'] = false;

        } else {
            $this->components['text_varchar']->_data['config']['componentDisabled'] = true;

        }
    }
}
