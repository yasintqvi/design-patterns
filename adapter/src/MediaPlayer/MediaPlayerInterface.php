<?php

namespace App\MediaPlayer;


interface MediaPlayerInterface 
{
    public function play($type, $media): string;
}