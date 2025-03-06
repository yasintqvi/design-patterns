<?php

namespace Src;

class History
{
    private Editor $editor;

    /**
     * @var EditorState[]
     */
    private array $editorStates;

    public function __construct(Editor $editor)
    {
        $this->editor = $editor;
    }

    public function backup(): void
    {
        $this->editorStates[] = $this->editor->createState();
    }

    public function undo(): void
    {
        if (count($this->editorStates) === 0) {
            return;
        }

        $prevState = array_pop($this->editorStates);

        $this->editor->restore($prevState);
    }

    public function states(): array
    {
        return $this->editorStates;
    }
}
