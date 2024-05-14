<?php
namespace CustomForm\FormData\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    public function getFormAction()
    {
        return $this->getUrl('customform/index/save', ['_secure' => true]);
    }
}
