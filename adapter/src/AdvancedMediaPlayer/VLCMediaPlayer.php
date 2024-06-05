<?php

namespace App\AdvancedMediaPlayer;

class VLCMediaPlayer implements AdvancedMediaPlayerInterface
{

    public function playMp3($media): string
    {
        return "play vlc mp3 file format ... ";
    }

    public function playMp4($media): string
    {
        return "play vlc mp4 file format ... ";
    }

}