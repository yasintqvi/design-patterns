<?php

namespace App;


class MessageEncryption extends MessageDecorator 
{
    
    public function getContent(): string
    {
        return $this->encrypt($this->message);    
    }

    
    public function encrypt($message)
    {
        return base64_encode($message);
    }

}