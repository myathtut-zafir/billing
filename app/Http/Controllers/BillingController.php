<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillingResource;
use App\Models\MonthlyPay;
use App\Models\TestingMake;
use App\Models\User;

class BillingController extends Controller
{
    public function index()
    {
        $monthlyBill = MonthlyPay::where('user_id', auth()->user()->id)->get();
        return BillingResource::collection($monthlyBill);
    }

    public function store()
    {

        $testingMake = TestingMake::make('John Doe', 'aa.htut@gmail.com');
        $testingMake2=new TestingMake('John Doe', 'aa.htut@gmail.com');

//        return $testingMake->getEmail();
//        return $testingMake2->getEmail();

    }
}
