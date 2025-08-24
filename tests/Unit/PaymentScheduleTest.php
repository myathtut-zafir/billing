<?php
declare(strict_types=1);
namespace Tests\Unit;

use App\Models\InvoiceModel;
use App\Models\PaymentScheduleModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class PaymentScheduleTest extends TestCase
{
    public function testCalculate()
    {
        $paymentSchedule = new PaymentScheduleModel();
        $result = $paymentSchedule->calculate(1000, 5);
        $this->assertEquals(200, $result);
    }
    public function testInvoice()
    {
        $date=Carbon::parse("2023-10-10")->toImmutable();
        $paymentSchedule = new InvoiceModel($date,1000);
        $result = $paymentSchedule->toArray();
        $this->assertEquals([
            'due_date' => '2023-10-10',
            'amount' => 1000,
            'is_overdue' => true
        ], $result);
    }

}
