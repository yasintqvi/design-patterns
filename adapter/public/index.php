<?php

use App\Adapters\MediaPlayerAdapter;
use App\AdvancedMediaPlayer\VLCMediaPlayer;

require_once dirname(__DIR__, 1) . "/vendor/autoload.php";


$vlcMediaPlayer = new VLCMediaPlayer;

$mediaPlayerAdapter = new MediaPlayerAdapter($vlcMediaPlayer);

echo $mediaPlayerAdapter->play("mp3", "music.mp3") . PHP_EOL;
echo $mediaPlayerAdapter->play("mp4", "video.mp4") . PHP_EOL;