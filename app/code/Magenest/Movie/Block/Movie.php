<?php

namespace Magenest\Movie\Block;

use Magenest\Movie\Model;
use Magenest\Movie\Model\ResourceModel;
use Magento\Framework\View\Element\Template;

/**
 * Class Movie
 * @package Magenest\Movie\Block
 */
class Movie extends Template
{
    /**
     * @var
     */
    protected $movieFactory;
    /**
     * @var ResourceModel\Movie
     */
    protected $movieResourceModel;
    /**
     * @var ResourceModel\Movie\MovieCollectionFactory
     */
    protected $movieCollectionFactory;

    /**
     * Movie constructor.
     * @param Template\Context $context
     * @param Model\MovieFactory $movieFactory
     * @param ResourceModel\Movie $movieResourceModel
     * @param ResourceModel\Movie\MovieCollectionFactory $movieCollectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Model\MovieFactory $movieFactory,
        ResourceModel\Movie $movieResourceModel,
        ResourceModel\Movie\MovieCollectionFactory $movieCollectionFactory,

        array $data = []
    )
    {
        $this->movieFactory = $movieFactory->create();
        $this->movieResourceModel = $movieResourceModel;
        $this->movieCollectionFactory = $movieCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getMovieItem()
    {

        $items = $this->movieCollectionFactory->create();
        $test = $items->getSelect()->joinLeft(
            ['md' => $items->getTable("magenest_director")],
            "main_table.director_id = md.director_id",
            ['director_name' => "md.name"]
        )->join(
            ['mma' => $items->getTable("magenest_movie_actor")],
            "main_table.movie_id = mma.movie_id",
        )->join(
            ["ma" => $items->getTable("magenest_actor")],
            "mma.actor_id = ma.actor_id",
            ["actors_name" => new \Zend_Db_Expr("GROUP_CONCAT(ma.name)")]
        )->group("main_table.movie_id", "main_table.name");

        return $items;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return ('HelloWorld!');
    }
}
