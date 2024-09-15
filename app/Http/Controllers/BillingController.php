<?php

namespace App\Http\Controllers;

use App\Models\MonthlyPay;
use App\Models\User;

class BillingController extends Controller
{
    public function index(User $user)
    {
        $monthlyBill = MonthlyPay::where('user_id', $user->id)->get();
        return $monthlyBill;
    }
}
