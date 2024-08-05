<?php

namespace App\Decorator;

class BaseComponent implements TextFormatter
{

    public function formatText(string $text): string
    {
        return $text;
    }
}
