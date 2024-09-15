<?php

namespace App\Console\Commands;

use App\Factories\MonthlyBill\CreateBilling;
use App\Factories\MonthlyBill\CreateNormalBillFactory;
use App\Models\MonthlyPay;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MonthlyBill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monthly-bill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $monthlyBillFactory = CreateBilling::getInstance(new CreateNormalBillFactory());
        foreach (User::all() as $user) {
            $data=$monthlyBillFactory->getBill($user);

            MonthlyPay::create([
                'user_id' => $user->id,
                'billing_amount' => $data->billing_amount,
                'billing_month' => $data->billing_month,
                'billing_year' => $data->billing_year
            ]);
        }
    }
}
