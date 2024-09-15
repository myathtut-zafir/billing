<?php

namespace App\Factories\MonthlyBill;

use App\Models\MonthlyPay;
use App\Models\Tran;
use App\Models\User;

class CreateNormalBill
{
    public function make(User $user, array $attributes = []): MonthlyPay
    {
        $attributes['billing_amount'] = $this->calculateBill($user);
        $attributes['billing_month'] = $this->calculateMonth($user);
        $attributes['billing_year'] = $this->calculateYear($user);
        return new MonthlyPay($attributes);
    }

    public function calculateBill(User $user): float
    {
        return 20000.00;
    }
    public function calculateMonth(User $user): ?string
    {
        $transaction = Tran::where('user_id', $user->id)
            ->where('month', date('m'))->where('year', date('Y'))->first();
        if ($transaction) {
            return null;
        }
        return date('m');
    }
    public function calculateYear(User $user): ?string
    {
        $transaction = Tran::where('user_id', $user->id)
            ->where('month', date('m'))->where('year', date('Y'))->first();
        if ($transaction) {
            return null;
        }
        return date('Y');
    }
}
