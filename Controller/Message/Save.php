<?php

namespace MMAcademy\Greetings\Controller\Message;

use Magento\Catalog\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use MMAcademy\Greetings\Api\GreetingsInterface;
use MMAcademy\Greetings\Model\MessageFactory;

class Save extends Action
{
    /**
     * @var GreetingsInterface
     */
    private $greetings;
    /**
     * @var MessageFactory
     */
    private $messageFactory;
    /**
     * @var Session
     */
    private $session;

    public function __construct(
        Context $context,
        GreetingsInterface $greetings,
        MessageFactory $messageFactory
    ) {
        parent::__construct($context);
        $this->greetings = $greetings;
        $this->messageFactory = $messageFactory;
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $auhtor = $this->getRequest()->getParam('name');
        $text = $this->getRequest()->getParam('msg');

        $message = $this->messageFactory->create();
        $message->setAuthor($auhtor);
        $message->setValue($text);

        try {
            $this->greetings->send($message);
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__('Cannot save message'));
        }

        $result = $this->resultRedirectFactory->create();
        $result->setPath('/');

        return $result;
    }
}