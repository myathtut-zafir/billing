<?php
namespace App\Models;

class PaymentScheduleModel
{

    function calculate(int $totalAmount, int $installments)
    {
        return $totalAmount / $installments;
    }
}
