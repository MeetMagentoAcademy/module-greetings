<?php

namespace MMAcademy\Greetings\Block;

use Magento\Framework\View\Element\Template;
use MMAcademy\Greetings\Api\GreetingsInterface;

class Messages extends Template
{
    /**
     * @var GreetingsInterface
     */
    private $greetings;

    protected $_template = 'messages.phtml';

    public function __construct(Template\Context $context,  GreetingsInterface $greetings, array $data = [])
    {
        parent::__construct($context, $data);
        $this->greetings = $greetings;
    }

    public function getCustomerMessages() {
        return $this->greetings->getLastMessages();
    }
}