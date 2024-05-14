<?php
namespace CustomForm\FormData\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Success extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Thank You For Submitting Your Details'));

        // Check if the 'content' block exists in the layout
        $contentBlock = $resultPage->getLayout()->getBlock('content');
        if ($contentBlock) {
            // Set the custom template
            $contentBlock->setTemplate('CustomForm_FormData::success.phtml');
        }

        return $resultPage;
    }
}
