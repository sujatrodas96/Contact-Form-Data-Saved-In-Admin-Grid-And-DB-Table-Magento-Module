<?php

namespace CustomForm\FormData\Block\Adminhtml\Data;

use Magento\Backend\Block\Widget\Grid\Extended;

class Grid extends Extended
{
    protected $_dataFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \CustomForm\FormData\Model\DataFactory $dataFactory,
        array $data = []
    ) {
        $this->_dataFactory = $dataFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('formdataGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = $this->_dataFactory->create()->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {   

        // Entity ID Column
        $this->addColumn(
            'entity_id',
            [
                'header' => __('Entity ID'),
                'index' => 'entity_id',
                'type' => 'number',
                'filter' => false,
                'sortable' => false,
                'header_css_class' => 'col-entity-id',
                'column_css_class' => 'col-entity-id',
            ]
        );

        // Name Column
        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name',
            ]
        );

        // Email Column
        $this->addColumn(
            'email',
            [
                'header' => __('Email'),
                'index' => 'email',
            ]
        );

        // Phone Column
        $this->addColumn(
            'phone',
            [
                'header' => __('Phone'),
                'index' => 'phone',
            ]
        );

        // Domain Column
        $this->addColumn(
            'domain',
            [
                'header' => __('Domain'),
                'index' => 'domain',
            ]
        );

        // Country Column
        $this->addColumn(
            'country',
            [
                'header' => __('Country'),
                'index' => 'country',
            ]
        );

        // State Column
        $this->addColumn(
            'state',
            [
                'header' => __('State'),
                'index' => 'state',
            ]
        );

        // Action Column
        $this->addColumn(
            'action',
            [
                'header' => __('Action'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => ['base' => '*/*/edit'],
                        'field' => 'entity_id',
                    ],
                    [
                        'caption' => __('Delete'),
                        'url' => ['base' => '*/*/delete'],
                        'field' => 'entity_id',
                        'confirm' => [
                            'title' => __('Delete %1', __('Record')),
                            'message' => __('Are you sure you want to delete this record?'),
                        ],
                    ],
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('selected[]'); // Add [] to indicate an array
    
        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('customform_formdata/data/massdelete'), // Check the URL here
                'confirm' => __('Are you sure you want to delete the selected records?'),
            ]
        );
    
        // Add more mass actions if needed
    
        return $this;
    }
    


    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    protected function _getSelectedValues()
    {
        $selectedValues = $this->getRequest()->getParam('selected');
        if (!is_array($selectedValues)) {
            $selectedValues = [];
        }
        return $selectedValues;
    }

   
}
