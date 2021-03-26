<?php


namespace Magenest\Movie\Plugin;

use Magento\Catalog\Model\ProductFactory;

class ChangeData
{
    protected $product;

    protected $urlBuilder;

    public function __construct(ProductFactory $product, \Magento\Catalog\Model\Product\Image\UrlBuilder $urlBuilder)
    {
        $this->product = $product;
        $this->urlBuilder = $urlBuilder;
    }

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
