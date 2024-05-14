<?php

namespace CustomForm\FormData\Block\Adminhtml\Data\Edit;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_data');

        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', ['entity_id' => $model->getId()]),
                    'method' => 'post'
                ]
            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Edit Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
                'class' => 'validate-length',
                'maxlength' => 255, // Set the maximum length as needed
                //'note' => __('Enter a valid country name.'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'class' => 'validate-email',
            ]
        );

        $fieldset->addField(
            'phone',
            'text',
            [
                'name' => 'phone',
                'label' => __('Phone'),
                'title' => __('Phone'),
                'class' => 'validate-phoneStrict',
                //'maxlength' => 10, // Set the maximum length
                //'minlength' => 10,
                //'note' => __('Enter a 10-digit phone number.'),
                'required' => true,
            ]
        );
        
        

        $fieldset->addField(
            'domain',
            'text',
            [
                'name' => 'domain',
                'label' => __('Domain'),
                'title' => __('Domain'),
                'class' => 'validate-clean-url',
                //'note' => __('Enter a URL starting with "https://www." or "http://www." and ending with ".com", ".in", ".org", etc.'),
                'required' => true,
            ]
        );
        
        

        $fieldset->addField(
            'country',
            'text',
            [
                'name' => 'country',
                'label' => __('Country'),
                'title' => __('Country'),
                'class' => 'validate-length',
                'maxlength' => 255, // Set the maximum length as needed
                //'note' => __('Enter a valid country name.'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'state',
            'text',
            [
                'name' => 'state',
                'label' => __('State'),
                'title' => __('State'),
                'class' => 'validate-length',
                'maxlength' => 255, // Set the maximum length as needed
                //'note' => __('Enter a valid country name.'),
                'required' => true,
            ]
        );

        $form->setValues($model->getData());

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
