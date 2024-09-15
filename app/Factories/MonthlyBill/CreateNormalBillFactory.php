<?php

namespace App\Factories\MonthlyBill;

use App\Models\User;

class CreateNormalBillFactory implements MonthlyBillFactory
{

    public function getMonthlyBill(User $user, array $attributes = [])
    {
        $normalBill = new CreateNormalBill();
        return $normalBill->make($user, $attributes);
    }
}
