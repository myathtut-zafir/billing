<?php

namespace App\Decorator;

class TrimDecorator extends TextFormat
{


    public function formatText(string $text): string
    {
        $text=parent::formatText($text);
        return trim($text);
    }
}
