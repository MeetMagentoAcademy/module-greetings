<?php

namespace MMAcademy\Greetings\Api\Data;

interface MessageInterface
{
    /**
     * @return string
     */
    public function getValue();

    /**
     * @return string
     */
    public function getAuthor();

    /**
     * @return string
     */
    public function getCreationTime();

    /**
     * @param string $text
     * @return void
     */
    public function setValue($text);

    /**
     * @param string $author
     * @return void
     */
    public function setAuthor($author);
}