<?php


namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magenest\Movie\Model\ActorFactory;
use Magenest\Movie\Model\ResourceModel\Actor as ActorResoureModel;
use Magento\Backend\App\Action\Context;

/**
 * Class Save
 * @package Magenest\Movie\Controller\Adminhtml\Actor
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var ActorFactory
     */
    protected $actorFactory;
    /**
     * @var ActorResoureModel
     */
    protected $actorResoureModel;

    /**
     * Save constructor.
     * @param Context $context
     * @param ActorFactory $actorFactory
     * @param ActorResoureModel $actorResoureModel
     */
    public function __construct(Context $context,
                                ActorFactory $actorFactory,
                                ActorResoureModel $actorResoureModel)
    {
        $this->actorFactory = $actorFactory;
        $this->actorResoureModel = $actorResoureModel;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['actor_id']) ? $data['actor_id'] : null;
        $newData = [
            "name" => $data["name"]
        ];
        $actor = $this->actorFactory->create();
        if ($id) {
            $actor->load($id);
            $this->getMessageManager()->addSuccessMessage(__("Edit is successfully !!!"));
        } else {
            try {
                $actor->addData($newData);
                $this->actorResoureModel->save($actor);
                $this->getMessageManager()->addSuccessMessage(__('Save is successfully !!!'));
                return $this->_redirect('magenest_admin/actor/index');
            } catch (\Exception $e) {
                $this->getMessageManager()->addErrorMessage(__('Save is failed.'));
                return $this->_redirect('magenest_admin/actor/index');
            }
        }
    }
}
