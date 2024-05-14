<?php

namespace CustomForm\FormData\Block\Adminhtml\Data\Grid\Renderer;

use Magento\Framework\DataObject;

class HeaderCheckbox extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    public function render(DataObject $row)
    {
        $html = '<input type="checkbox" id="headerCheckbox" class="checkbox" onclick="toggleAllCheckboxes()">';
        return $html;
    }
}
