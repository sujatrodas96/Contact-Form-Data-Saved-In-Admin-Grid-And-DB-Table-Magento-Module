<?php
namespace CustomForm\FormData\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class DataDeferred extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customform_formdata', 'entity_id');
    }
}
