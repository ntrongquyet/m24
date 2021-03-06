<?php


namespace Magenest\Movie\Observer;


use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;

/**
 * Class SavePingToPong
 * @package Magenest\Movie\Observer
 */
class SavePingToPong implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @var RequestInterface
     */
    private $_request;
    /**
     * @var WriterInterface
     */
    private $_configWriter;

    /**
     * SavePingToPong constructor.
     * @param RequestInterface $request
     * @param WriterInterface $configWriter
     */
    public function __construct(RequestInterface $request,
                                WriterInterface $configWriter
    )
    {
        $this->_request = $request;
        $this->_configWriter = $configWriter;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $sectionParams = $this->_request->getParam('groups');
        try {
            $dataFieldText = $sectionParams['general']['fields']['text_field']['value'];
            if ($dataFieldText == "Ping") {
                $this->_configWriter->save('mgn_movie_section/general/text_field', "Pong");
            }
        } catch (\Exception $e) {
            return;
        }

    }
}
