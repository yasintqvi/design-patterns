<?php

require_once "vendor/autoload.php";

use Src\Editor;
use Src\History;

$editor = new Editor;

$history = new History($editor);

$history->backup();

$editor->setTitle("Test");

$history->backup();

$editor->setContent("Hello there, my name is yasin");

$history->backup();

$editor->setTitle("The life of a dev: my mementos");

echo $editor->getTitle() . PHP_EOL;

echo $editor->getContent() . PHP_EOL;

$history->undo();

echo $editor->getTitle() . PHP_EOL;

echo $editor->getContent() . PHP_EOL;
