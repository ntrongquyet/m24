<?php


namespace Magenest\ChapterFour\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Element\DataType\Date as Datetime;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Fieldset;

class Fields extends AbstractModifier
{
    private $locator;

    public function __construct(LocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    public function modifyData(array $data)
    {
        return $data;
    }

    public function modifyMeta(array $meta)
    {

        $meta = array_replace_recursive($meta,
            [
                'magenest_newsection' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('The New Section'),
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.magenestNewSection',
                                'collapsible' => true,
                                'sortOrder' => 0
                            ],
                        ],
                    ],
                    'children' => [
                        'magenest_thenewselect' => [
                            'arguments' => [
                                'data' => [
                                    'config' => [
                                        'label' => __('New Select'),
                                        'componentType' => Field::NAME,
                                        'formElement' => Select::NAME,
                                        'dataScope' => 'status',
                                        'dataType' => Text::NAME,
                                        'sortOrder' => 10,
                                        'options' => [
                                            ['value' => '0', 'label' => __('Inactive')],
                                            ['value' => '1', 'label' => __('Active')]
                                        ],
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ]);


        $meta['product-details']['children'] = array_merge($meta['product-details']['children'], ['magenest' => [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Date Picker'),
                        'component' => 'Magenest_ChapterFour/js/product/disable-date-set',
                        'componentType' => Field::NAME,
                        'formElement' => Datetime::NAME,
                        'dataScope' => 'datepicker',
                        'source' => 'product-details',
                        'sortOrder' => 10
                    ],
                ],
            ],
        ],]);
        return $meta;
    }


}
