<?php

use App\MessageCompression;
use App\MessageEncryption;
use App\SimpleMessage;
use App\TestClass;

require_once dirname(__DIR__, 1) . "/vendor/autoload.php";

$message = new SimpleMessage("Hello , ohaaae, how're U ?!!!!!!!!!");

echo $message->getContent() . PHP_EOL;


/**
 *  encryption message
 */
$message = new MessageEncryption($message);

echo $message->getContent() . PHP_EOL;


/**
 * compression message
 */

$message = new MessageCompression($message);

echo $message->getContent() . PHP_EOL;
