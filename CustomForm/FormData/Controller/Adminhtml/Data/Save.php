<?php

namespace CustomForm\FormData\Controller\Adminhtml\Data;

use Magento\Backend\App\Action;
use CustomForm\FormData\Model\DataFactory;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{
    protected $dataFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        DataFactory $dataFactory
    ) {
        parent::__construct($context);
        $this->dataFactory = $dataFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->_redirect('*/*/');
            return;
        }

        try {
            $id = $this->getRequest()->getParam('entity_id');
            $model = $this->dataFactory->create();

            if ($id) {
                $model->load($id);
            }

            $model->setData($data);
            $model->save();

            $this->messageManager->addSuccessMessage(__('Record has been saved.'));
            $this->_getSession()->setFormData(false);

            if ($this->getRequest()->getParam('back')) {
                $this->_redirect('*/*/edit', ['entity_id' => $model->getId()]);
                return;
            }

            $this->_redirect('*/*/');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
        }
    }
}
