<?php


namespace Magenest\Movie\Plugin;

use Magento\Catalog\Model\ProductFactory;

/**
 * Class ChangeData
 * @package Magenest\Movie\Plugin
 */
class ChangeData
{
    /**
     * @var ProductFactory
     */
    protected $product;

    /**
     * @var \Magento\Catalog\Model\Product\Image\UrlBuilder
     */
    protected $urlBuilder;

    /**
     * ChangeData constructor.
     * @param ProductFactory $product
     * @param \Magento\Catalog\Model\Product\Image\UrlBuilder $urlBuilder
     */
    public function __construct(ProductFactory $product, \Magento\Catalog\Model\Product\Image\UrlBuilder $urlBuilder)
    {
        $this->product = $product;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @param $subject
     * @param $result
     * @return mixed
     */
    public function afterGetItemData($subject, $result)
    {
        $product = $this->product->create()->load($result['product_id']);
        if ($result['product_type'] == "configurable") {
            $children = $product->getTypeInstance()->getUsedProducts($product);
            $option_value = $result['options'][0]['option_value'];
            $simple_product = null;
            foreach ($children as $item) {
                if ($option_value == $item->getData("color")) {
                    $simple_product = $item;
                    break;
                };
            };
            $result['product_image']['src'] = $this->urlBuilder->getUrl($simple_product->getData('small_image'), "product_base_image");
            $result['product_name'] = $simple_product->getData('name');
            return $result;
        }

        return $result;
    }
}
