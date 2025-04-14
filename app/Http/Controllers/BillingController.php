<?php

namespace App\Http\Controllers;

use AgeekDev\MyanmarCurrency\Facades\MyanmarCurrency;
use App\Discount\Discount;
use App\Discount\DiscountClient;
use App\Http\Resources\BillingResource;
use App\Models\MonthlyPay;
use App\Models\TestingMake;

class BillingController extends Controller
{
    public function index()
    {
        return MyanmarCurrency::convertMyanmarText("10020");
        $monthlyBill = MonthlyPay::all();
        return BillingResource::collection($monthlyBill);
    }

    public function store()
    {

        $testingMake = TestingMake::make('John Doe', 'aa.htut@gmail.com');
        $testingMake2=new TestingMake('John Doe', 'aa.htut@gmail.com');

//        return $testingMake->getEmail();
//        return $testingMake2->getEmail();

    }
    /**
     * testing the tap method
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
//        return MonthlyPay::find(1)->update(['billing_amount' => 1000]); // it will return true or false
        $monthlyPay = MonthlyPay::find(1);
        return response()->json(tap($monthlyPay)->update([
            'billing_amount' => 55555,
        ])); // it will return model obkject

    }
    public function discount()
    {
    $discount=new DiscountClient();
    $discount->applyDiscount(Discount::percentOff(90));
    return $discount->discount->percentage;
    }
}
