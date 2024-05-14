<?php

namespace CustomForm\FormData\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class CollectionFactory extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'customform_formdata';

    protected function _construct()
    {
        $this->_init(\CustomForm\FormData\Model\Data::class, \CustomForm\FormData\Model\ResourceModel\Data::class);
    }
}
