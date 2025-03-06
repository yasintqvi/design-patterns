<?php

namespace Src;

class Editor
{
    private ?string $title = null;

    private ?string $content = null;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function createState(): EditorState
    {
        return new EditorState(
            $this->title,
            $this->content
        );
    }

    public function restore(EditorState $editorState): void
    {
        $this->title = $editorState->getTitle();

        $this->content = $editorState->getContent();
    }
}
