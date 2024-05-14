<?php
namespace CustomForm\FormData\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Data extends Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'CustomForm_FormData';
        $this->_controller = 'adminhtml_data';
        $this->_headerText = __('Form Data');
        parent::_construct();
    }
}
