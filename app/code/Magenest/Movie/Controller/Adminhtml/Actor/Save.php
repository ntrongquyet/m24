<?php


namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magenest\Movie\Model\ActorFactory;
use Magenest\Movie\Model\ResourceModel\Actor as ActorResoureModel;
use Magento\Backend\App\Action\Context;

class Save extends \Magento\Backend\App\Action
{
    protected $actorFactory;
    protected $actorResoureModel;

    public function __construct(Context $context,
                                ActorFactory $actorFactory,
                                ActorResoureModel $actorResoureModel)
    {
        $this->actorFactory = $actorFactory;
        $this->actorResoureModel = $actorResoureModel;
        parent::__construct($context);
    }

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
