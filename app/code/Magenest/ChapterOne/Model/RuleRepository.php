<?php


namespace Magenest\ChapterOne\Model;

use Magenest\ChapterOne\Model\ResoucreModel\Rules as RulesResourceModel;
use Magenest\ChapterOne\Model\ResoucreModel\Rules\CollectionFactory as RulesCollectionFactory;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class RuleRepository
 * @package Magenest\ChapterSix\Api\Data
 */
class RuleRepository implements \Magenest\ChapterSix\Api\RuleRepositoryInterface
{

    protected $cache;
    protected $serializer;
    /**
     * @var RulesFactory
     */
    protected $rulesFactory;
    /**
     * @var RulesResourceModel
     */
    protected $rulesResouceModel;
    /**
     * @var RulesCollectionFactory
     */
    protected $rulesCollectionFactory;

    /**
     * RuleRepository constructor.
     * @param RulesFactory $rulesFactory
     * @param RulesResourceModel $rulesResourceModel
     * @param RulesCollectionFactory $rulesCollectionFactory
     */
    public function __construct(RulesFactory $rulesFactory,
                                RulesResourceModel $rulesResourceModel,
                                RulesCollectionFactory $rulesCollectionFactory,
                                CacheInterface $cache,
                                Json $serializer)
    {
        $this->cache = $cache;
        $this->rulesCollectionFactory = $rulesCollectionFactory->create();
        $this->rulesFactory = $rulesFactory->create();
        $this->rulesResouceModel = $rulesResourceModel;
        $this->serializer = $serializer ?: objectManager::getInstance()->get(Json::class);
    }

    /**
     * @return mixed
     */
    public function load()
    {
        return $this->rulesCollectionFactory->create()->load();
    }

    /**
     * @param RulesFactory $rules
     * @return mixed|void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(\Magenest\ChapterOne\Model\Rules $rules)
    {

        return $this->rulesResouceModel->save($rules);
    }

    /**
     * @param \Magenest\ChapterOne\Model\Rules $rules
     * @return mixed|void
     * @throws \Exception
     */
    public function delete(\Magenest\ChapterOne\Model\Rules $rules)
    {
        return $this->rulesResouceModel->delete($rules);
    }

    /**
     * @param $id
     * @return array Data
     */
    public function getbyID($id): array
    {
        $isCacheEmpty = $this->cache->load($id);
        if (!$isCacheEmpty) {
            $this->rulesResouceModel->load($this->rulesFactory, $id);
            $data = $this->serializer->serialize($this->rulesFactory->getData());
            $this->cache->save($data, $id, ["TAG_CACHE_MGN"], 86400);
            return $this->rulesFactory->getData();


        } else {
            return $this->serializer->unserialize($isCacheEmpty);
        }
    }
}
