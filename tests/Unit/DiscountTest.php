<?php

namespace Tests\Unit;


use App\Discount\Discount;
use App\Discount\DiscountClient;

test('check discount client', function () {
    $discount = new DiscountClient();
    $discount->applyDiscount(Discount::percentOff(90));
    expect($discount->discount->percentage)->toBe(0.9);
});
test('check discount', function () {
    $discount = new DiscountClient();
    $discount->applyDiscount(Discount::percentOff(90));

    $discount = new Discount($discount->discount->percentage);
    expect($discount->percentage)->toBe(0.9);
});

test('throws exception when percentage is less than or equal to 0', function () {
    new Discount(0.0);
})->throws(\InvalidArgumentException::class);
