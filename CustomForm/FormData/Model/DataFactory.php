<?php

namespace CustomForm\FormData\Model;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\App\ObjectManager;

class DataFactory
{
    protected $objectManager;
    protected $instanceName = '\CustomForm\FormData\Model\Data';

    public function __construct(ObjectManagerInterface $objectManager = null)
    {
        $this->objectManager = $objectManager ?: ObjectManager::getInstance();
    }

    public function create(array $data = [])
    {
        return $this->objectManager->create($this->instanceName, $data);
    }
}
