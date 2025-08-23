<?php
declare(strict_types=1);
namespace Tests\Unit;

use App\Models\PaymentScheduleModel;
use Tests\TestCase;

class PaymentScheduleTest extends TestCase
{
    public function testCalculate()
    {
        $paymentSchedule = new PaymentScheduleModel();
        $result = $paymentSchedule->calculate(1000, 5);
        $this->assertEquals(200, $result);
    }

}
