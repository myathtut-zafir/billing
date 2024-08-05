<?php

namespace App\Decorator;

interface TextFormatter
{
    public function formatText(string $text): string;
}
