<?php
namespace CustomForm\FormData\Controller\Adminhtml\Data;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use CustomForm\FormData\Model\DataFactory;


class Delete extends Action
{
    protected $dataFactory;

    public function __construct(Context $context, DataFactory $dataFactory)
    {
        parent::__construct($context);
        $this->dataFactory = $dataFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');

        if ($id) {
            try {
                $dataModel = $this->dataFactory->create();
                $dataModel->load($id);
                $dataModel->delete();
                $this->messageManager->addSuccessMessage(__('Record has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error occurred while deleting the record.'));
            }
        }

        // Redirect to grid page
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/grid');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('CustomForm_FormData::delete');
    }
}
