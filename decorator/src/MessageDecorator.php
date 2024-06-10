<?php

namespace App;


abstract class MessageDecorator implements MessageInterface
{

    protected $message;

    public function __construct(MessageInterface $messageInterface)
    {
        $this->message = $messageInterface->getContent();     
    }

}