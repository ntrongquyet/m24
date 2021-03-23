<?php


namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magenest\Movie\Model\DirectorFactory;
use Magenest\Movie\Model\ResourceModel\Director as DirectorResoureModel;
use Magento\Backend\App\Action\Context;

class Save extends \Magento\Backend\App\Action
{
    protected $directorFactory;
    protected $directorResoureModel;

    public function __construct(Context $context,
                                DirectorFactory $directorFactory,
                                DirectorResoureModel $directorResoureModel)
    {
        $this->directorFactory = $directorFactory;
        $this->directorResoureModel = $directorResoureModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['director_id']) ? $data['director_id'] : null;
        $newData = [
            "name" => $data["name"]
        ];
        $director = $this->directorFactory->create();
        if ($id) {
            $director->load($id);
            $this->getMessageManager()->addSuccessMessage(__("Edit is successfully !!!"));
        } else {
            try {
                $director->addData($newData);
                $this->directorResoureModel->save($director);
                $this->getMessageManager()->addSuccessMessage(__('Save is successfully !!!'));
                return $this->_redirect('magenest_admin/director/index');
            } catch (\Exception $e) {
                $this->getMessageManager()->addErrorMessage(__('Save is failed.'));
                return $this->_redirect('magenest_admin/director/index');
            }
        }
    }
}
