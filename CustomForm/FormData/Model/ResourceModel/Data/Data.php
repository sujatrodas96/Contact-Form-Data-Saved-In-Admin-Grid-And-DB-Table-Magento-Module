<?php
namespace CustomForm\FormData\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollectionFactory;

class CollectionFactory extends AbstractCollectionFactory
{
    protected $_idFieldName = 'entity_id';
    protected $_collectionName = 'CustomForm\FormData\Model\ResourceModel\Data\Collection';

    protected $_model = 'CustomForm\FormData\Model\Data';
}
