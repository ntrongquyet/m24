<?php


namespace Magenest\ChapterSix\Controller\Adminhtml\Index;

use Magenest\ChapterOne\Model\RuleRepository;
use Magenest\ChapterOne\Model\RulesFactory;
use Magento\Backend\App\Action\Context;

/**
 * Class Save
 * @package Magenest\ChapterSix\Controller\Adminhtml\Index
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var RulesFactory
     */
    protected $rulesFactory;
    /**
     * @var RuleRepository
     */
    protected $ruleRepository;

    /**
     * Save constructor.
     * @param Context $context
     * @param RuleRepository $ruleRepository
     * @param RulesFactory $rulesFactory
     */
    public function __construct(Context $context,
                                RuleRepository $ruleRepository,
                                RulesFactory $rulesFactory)
    {
        $this->rulesFactory = $rulesFactory;
        $this->ruleRepository = $ruleRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['id']) ? $data['id'] : null;
        $newData = [
            "title" => $data["title"],
            "rule_type" => $data["rule_type"],
            "status" => $data['status'],
        ];
        $rule = $this->rulesFactory->create();
        if ($id) {
            $this->ruleRepository->getbyID($id);
            $this->getMessageManager()->addSuccessMessage(__("Edit is successfully !!!"));
        } else {
            try {
                $rule->addData($newData);
                $this->ruleRepository->save($rule);
                $this->getMessageManager()->addSuccessMessage(__('Save is successfully !!!'));
                return $this->_redirect('magenest_admin/movie/index');
            } catch (\Exception $e) {
                $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
                return $this->_redirect('magenest_admin/movie/index');
            }
        }
    }
}
