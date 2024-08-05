<?php

namespace App\Decorator;

use Illuminate\Support\Str;

class MentionDecorator extends TextFormat
{


    public function formatText(string $text): string
    {
        $text=parent::formatText($text);
        return Str::replace("@nick","<a href='https://www.twitter.com/$1'>$0</a>",$text);
    }
}
