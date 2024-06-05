<?php


namespace App\AdvancedMediaPlayer;

interface  AdvancedMediaPlayerInterface
{
    public function playMp3($media): string;
    
    public function playMp4($media): string;

}