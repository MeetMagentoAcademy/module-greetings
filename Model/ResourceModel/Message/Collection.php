<?php

namespace MMAcademy\Greetings\Model\ResourceModel\Message;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MMAcademy\Greetings\Model\Message;
use MMAcademy\Greetings\Model\ResourceModel\Message as MessageResource;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(Message::class, MessageResource::class);
        parent::_construct();
    }
}