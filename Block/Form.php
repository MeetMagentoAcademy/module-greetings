<?php

namespace MMAcademy\Greetings\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    protected $_template = 'form.phtml';

    public function getFormUrl()
    {
        return $this->getUrl('greetings/message/save');
    }
}