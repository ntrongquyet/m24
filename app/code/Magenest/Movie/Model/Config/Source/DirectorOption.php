<?php


namespace Magenest\Movie\Model\Config\Source;

use Magenest\Movie\Model\ResourceModel\Director\DirectorCollectionFactory;

class DirectorOption implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var DirectorCollectionFactory
     */
    protected $_collection;

    /**
     * DirectorOption constructor.
     * @param DirectorCollectionFactory $collectionFactory
     */
    public function __construct(DirectorCollectionFactory $collectionFactory)
    {
        $this->_collection = $collectionFactory;
    }

    public function toOptionArray()
    {
        $arr = [];
        /** @var \Magenest\Movie\Model\ResourceModel\Movie\DirectorCollectionFactory $items */

        $items = $this->_collection->create();
        $items->addFieldToSelect('*')
            ->getItems();
        foreach ($items as $item) {
            if (empty($arr)) {
                $arr = [["value" => $item['director_id'], "label" => $item['name']]];

            } else {
                array_push($arr, ["value" => $item['director_id'], "label" => $item['name']]);
            }
        }
        return $arr;
    }
}
