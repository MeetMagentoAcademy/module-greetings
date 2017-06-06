<?php

namespace MMAcademy\Greetings\Model;

use MMAcademy\Greetings\Api\GreetingsInterface;
use MMAcademy\Greetings\Model\ResourceModel\Message;

class GreetingsManager implements GreetingsInterface
{

    /**
     * @var Message
     */
    private $messageResource;
    /**
     * @var Message\CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var MessageFactory
     */
    private $messageFactory;

    public function __construct(
        Message $messageResource,
        \MMAcademy\Greetings\Model\MessageFactory $messageFactory,
        Message\CollectionFactory $collectionFactory
    ) {
        $this->messageResource = $messageResource;
        $this->collectionFactory = $collectionFactory;
        $this->messageFactory = $messageFactory;
    }

    /**
     * Returns last 5 messages
     *
     * @return \MMAcademy\Greetings\Api\Data\MessageInterface[]
     */
    public function getLastMessages()
    {
        /** @var Message\Collection $collection */
        $collection = $this->collectionFactory->create();
        $collection->setPageSize(5);
        $collection->setOrder('creation_time');

        return $collection->getItems();
    }

    /**
     * Allows to create a new message
     *
     * @param \MMAcademy\Greetings\Api\Data\MessageInterface $message
     * @return void
     */
    public function send(\MMAcademy\Greetings\Api\Data\MessageInterface $message)
    {

        $newMessage = $this->messageFactory->create();
        $newMessage->setAuthor($message->getAuthor());
        $newMessage->setValue($message->getValue());

        $this->messageResource->save($newMessage);
    }
}