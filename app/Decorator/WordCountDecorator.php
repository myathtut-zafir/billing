<?php

namespace App\Decorator;

use Illuminate\Support\Str;

class WordCountDecorator extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text) . PHP_EOL;
        return "Word Count: ".Str::wordCount($text);
    }
}
