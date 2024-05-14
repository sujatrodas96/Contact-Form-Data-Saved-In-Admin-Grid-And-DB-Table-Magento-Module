<?php
namespace CustomForm\FormData\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use CustomForm\FormData\Model\DataFactory;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{
    protected $dataFactory;

    public function __construct(
        Context $context,
        DataFactory $dataFactory
    ) {
        parent::__construct($context);
        $this->dataFactory = $dataFactory;
    }

    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();

        // Check if the same email already exists in the database
        $existingData = $this->dataFactory->create()->getCollection()
            ->addFieldToFilter('email', $postData['email'])
            ->getFirstItem();

        if ($existingData->getId()) {
            // If email already exists, show an error message
            $this->messageManager->addErrorMessage(__('Email already exists. Please use a different email address.'));

            // Redirect back to the form page
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('customform/index/index');
            return $resultRedirect;
        }

        // Save data to the database
        $dataModel = $this->dataFactory->create();
        $dataModel->setData($postData);
        $dataModel->save();

        // Set thank you message
        $this->messageManager->addSuccessMessage(__('Thank you for submitting the form!'));

        // Redirect to the success page
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('customform/index/index');
        return $resultRedirect;
    }
}
