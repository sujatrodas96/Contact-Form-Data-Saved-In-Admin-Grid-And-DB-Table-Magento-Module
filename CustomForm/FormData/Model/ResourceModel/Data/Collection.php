<?php
namespace CustomForm\FormData\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use CustomForm\FormData\Model\Data;
use CustomForm\FormData\Model\ResourceModel\Data as DataResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'customform_formdata_data_collection';

    protected function _construct()
    {
        $this->_init(Data::class, DataResourceModel::class);
    }
}
