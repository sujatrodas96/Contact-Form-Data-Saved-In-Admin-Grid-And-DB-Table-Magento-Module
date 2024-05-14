<?php

namespace CustomForm\FormData\Block\Adminhtml\Data\Grid\Renderer;

use Magento\Framework\DataObject;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\ObjectManager;

class Action extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;

    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_urlBuilder = $urlBuilder;
    }

    public function render(DataObject $row)
    {
        $deleteUrl = $this->_urlBuilder->getUrl('*/*/delete', ['entity_id' => $row->getId()]);
        $html = '<select onchange="actionOption(this)">
                    <option value="">Select Action</option>
                    <option value="' . $deleteUrl . '">Delete</option>
                </select>';
        return $html;
    }
}

