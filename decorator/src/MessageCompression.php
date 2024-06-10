<?php

namespace App;

class MessageCompression extends MessageDecorator
{

    public function getContent(): string
    {
        return $this->compression($this->message    );
    }

    public function compression($message)
    {
        return gzcompress($message);
    }
}
