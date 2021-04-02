<?php


namespace Magenest\ChapterFive\Model\Attribute\Backend;


class Product extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    protected $attributeRepository;
    protected $columnFactory;

    public function __construct(\Magento\Catalog\Ui\Component\ColumnFactory $columnFactory,
                                \Magento\Catalog\Ui\Component\Listing\Attribute\RepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->columnFactory = $columnFactory;
    }

    public function afterLoad($object)
    {
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
        return parent::afterLoad($object); // TODO: Change the autogenerated stub
    }
}
