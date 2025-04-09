<?php

namespace App\Discount;

class DiscountClient
{
    public Discount $discount;


    public  function applyDiscount(Discount $discount): void
    {
        $this->discount = $discount;
    }
}
