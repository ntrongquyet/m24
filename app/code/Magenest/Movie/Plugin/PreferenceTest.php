<?php


namespace Magenest\Movie\Plugin;

class PreferenceTest extends \Magenest\Movie\Plugin\ChangeData
{
    public function afterGetItemData($subject, $result)
    {
        $result['product_image']['src'] = "https://pbs.twimg.com/profile_images/548120169470373888/_89otEa4.jpeg";
        return $result;
    }
}
