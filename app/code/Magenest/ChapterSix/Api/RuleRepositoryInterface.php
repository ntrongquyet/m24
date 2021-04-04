<?php


namespace Magenest\ChapterSix\Api;


/**
 * Interface RuleRepositoryInterface
 * @package Magenest\ChapterSix\Api
 */
interface RuleRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getbyID($id);

    /**
     * Load all list rules
     * @return mixed
     */
    public function load();

    /**
     * @param \Magenest\ChapterOne\Model\RulesFactory $rules
     * @return mixed
     */
    public function save(\Magenest\ChapterOne\Model\Rules $rules);

    /**
     * Delete rules
     * @param \Magenest\ChapterOne\Model\Rules $rules
     * @return mixed
     */
    public function delete(\Magenest\ChapterOne\Model\Rules $rules);
}
