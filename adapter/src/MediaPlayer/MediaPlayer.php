<?php

namespace App\MediaPlayer;


class MediaPlayer implements MediaPlayerInterface
{
    public function play($type, $media): string
    {
        if ($type == "mp3") {
            return "play {$media} with {$type} ...";
        }

        return "the file format is not supported !";
    }
}
