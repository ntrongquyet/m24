<?php


namespace Magenest\Movie\Ui\Component\Listing\Columns\Style;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Star extends Column
{
    protected $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $html = [
                    '<span style="color: rgb(51, 51, 51); font-size: 18px;">★</span>',
                    '<span style="color: rgb(51, 51, 51);font-size: 18px;">★</span>',
                    '<span style="color: rgb(51, 51, 51);font-size: 18px;">★</span>',
                    '<span style="color: rgb(51, 51, 51);font-size: 18px;">★</span>',
                    '<span style="color: rgb(51, 51, 51);font-size: 18px;">★</span>'

                ];
                for ($i = 0; $i < (int)$item['rating']; $i++) {
                    $html[$i] = '<span style="color:rgb(255,255,51);font-size: 20px;">★</span>';
                }
                $html = implode('', $html);
                $item[$this->getData('name')] = $html;
            }
        }

        return $dataSource;
    }
}
