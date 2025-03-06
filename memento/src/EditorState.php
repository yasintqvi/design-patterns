<?php

namespace Src;

use DateTime;

class EditorState
{
    private readonly ?string $title;

    private readonly ?string $content;

    private readonly DateTime $date;

    public function __construct(?string $title = null, ?string $content = null)
    {
        $this->title = $title;

        $this->content = $content;

        $this->date = new DateTime();
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }
}
