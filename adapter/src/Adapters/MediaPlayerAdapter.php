<?php

namespace App\Adapters;

use App\AdvancedMediaPlayer\AdvancedMediaPlayerInterface;
use App\MediaPlayer\MediaPlayerInterface;

class MediaPlayerAdapter implements MediaPlayerInterface
{
    private $mediaPlayer;

    public function __construct(AdvancedMediaPlayerInterface $advancedMediaPlayerInterface)
    {
        $this->mediaPlayer = $advancedMediaPlayerInterface;
    }

    public function play($type, $media): string
    {
        if ($type == "mp3") {
            return $this->mediaPlayer->playMp3($media);
        }

        else if ($type == "mp4") {
            return $this->mediaPlayer->playMp4($media);
        }

        else {
            return "the file format is not supported !";
        }
    }

}
