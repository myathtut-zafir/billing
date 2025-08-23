<?php

namespace Tests\Unit;

use App\Models\PaymentScheduleModel;
use Tests\TestCase;

class PaymentScheduleTest extends TestCase
{
    public function testCalculate()
    {
        $paymentSchedule = new PaymentScheduleModel();
        $result = $paymentSchedule->calculate("ggg", 5);
        $this->assertEquals(200, $result);
    }

}
