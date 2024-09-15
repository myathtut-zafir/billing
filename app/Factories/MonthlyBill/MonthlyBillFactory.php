<?php

namespace App\Factories\MonthlyBill;

use App\Models\User;

interface MonthlyBillFactory
{
    public function getMonthlyBill(User $user,array $attributes = []);
}
