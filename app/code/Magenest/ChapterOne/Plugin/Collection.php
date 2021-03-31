<?php


namespace Magenest\ChapterOne\Plugin;


/**
 * Class Collection
 * @package Magenest\ChapterOne\Plugin
 */
class Collection
{
    /**
     * @param $subject
     * @param $result
     * @return mixed
     */
    public function afterGetItems($subject, $result)
    {
        $items = $result;
        foreach ($items as $key => $item) {
            if ($item['status'] != 'pending') {
                array_splice($items, $key - 1, 1);
            }
        }
        return $items;
    }
}
