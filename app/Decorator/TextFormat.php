<?php

namespace App\Decorator;

class TextFormat implements TextFormatter
{


    public function __construct(private TextFormatter $formatter)
    {

    }

    public function formatText(string $text): string
    {
        return $this->formatter->formatText($text);
    }
}
