<?php
namespace CustomForm\FormData\Model;

use Magento\Framework\Model\AbstractModel;

class Data extends AbstractModel
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'customform_formdata';

    protected function _construct()
    {
        $this->_init(\CustomForm\FormData\Model\ResourceModel\Data::class);
    }
}
