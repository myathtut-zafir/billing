<?php

namespace App\Http\Controllers;

use App\Models\MonthlyPay;
use App\Models\User;

class BillingController extends Controller
{
    public function index()
    {
        $monthlyBill = MonthlyPay::where('user_id', auth()->user()->id)->get();
        return $monthlyBill;
    }
}
