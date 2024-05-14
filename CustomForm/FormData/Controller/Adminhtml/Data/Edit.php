<?php

// app/code/CustomForm/Formdata/Controller/Adminhtml/Data/Edit.php

namespace CustomForm\FormData\Controller\Adminhtml\Data;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use CustomForm\FormData\Model\DataFactory;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $registry;
    protected $dataFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        DataFactory $dataFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        $this->dataFactory = $dataFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->dataFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This record no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->registry->register('current_data', $model);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Record'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('CustomForm_FormData::edit');
    }
}
