<?php


namespace Magenest\ChapterOne\Plugin;


class Collection
{
    public function afterGetItems($subject, $result)
    {
        $items = $result;
        foreach ($items as $key => $item) {
            if ($item['status'] != 'pending') {
                array_splice($items,$key-1,1);
            }
        }
        return $items;
    }
}
