<?php

namespace CustomForm\FormData\Block\Adminhtml\Data;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    protected $_objectId = 'entity_id';
    protected $_blockGroup = 'CustomForm_FormData';
    protected $_controller = 'adminhtml_data';

    protected function _construct()
    {
        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Record'));
        $this->buttonList->update('delete', 'label', __('Delete'));

        $this->_objectId = 'entity_id';
        $this->_blockGroup = 'CustomForm_FormData';
        $this->_controller = 'adminhtml_data';

        $this->addButton(
            'save_and_continue_edit',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'onclick' => 'saveAndContinueEdit()',
            ],
            -100
        );

        $this->_formScripts[] = "
            function saveAndContinueEdit() {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
}
