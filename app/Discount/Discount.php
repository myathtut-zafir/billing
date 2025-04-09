<?php

namespace App\Discount;

class Discount
{

    public function __construct(private readonly float $percentage)
    {
        if ($percentage <= 0 || $percentage > 1.0) {
            throw new \InvalidArgumentException('Percentage must be between 0 and 100.');
        }
    }

    public static function percentOff(int $value): self
    {
        return new self($value / 100);
    }
}
