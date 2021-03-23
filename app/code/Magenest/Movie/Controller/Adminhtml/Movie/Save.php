<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magenest\Movie\Model\MovieFactory;
use Magenest\Movie\Model\ResourceModel\Movie as MovieResoureModel;
use Magento\Backend\App\Action\Context;

class Save extends \Magento\Backend\App\Action
{
    protected $movieFactory;
    protected $movieResoureModel;

    public function __construct(Context $context,
                                MovieFactory $movieFactory,
                                MovieResoureModel $movieResoureModel)
    {
        $this->movieFactory = $movieFactory;
        $this->movieResoureModel = $movieResoureModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['movie_id']) ? $data['movie_id'] : null;
        $newData = [
            "name" => $data["name"],
            "description" => $data["description"],
            "rating" => $data['rating'],
            "director_id" => $data["director_id"]
        ];
        $movie = $this->movieFactory->create();
        if ($id) {
            $movie->load($id);
            $this->getMessageManager()->addSuccessMessage(__("Edit is successfully !!!"));
        } else {
            try {
                $movie->addData($newData);
                $this->movieResoureModel->save($movie);
                $this->_eventManager->dispatch('magenest_movie_save_after_movie', ["movie" => $movie]);
                $this->getMessageManager()->addSuccessMessage(__('Save is successfully !!!'));
                return $this->_redirect('magenest_admin/movie/index');
            } catch (\Exception $e) {
                $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
                return $this->_redirect('magenest_admin/movie/index');
            }
        }
    }
}
