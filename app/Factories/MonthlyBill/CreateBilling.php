<?php


namespace App\Factories\MonthlyBill;
use App\Factories\UserFactory;
use App\Models\User;

class CreateBilling
{
    private static CreateBilling $instance;
    protected MonthlyBillFactory $monthlyBillFactory;

    private function __construct(MonthlyBillFactory $monthlyBillFactory)
    {
        $this->monthlyBillFactory = $monthlyBillFactory;
    }

    public static function getInstance(MonthlyBillFactory $monthlyBillFactory): CreateBilling
    {
        if (empty(self::$instance)) {
            self::$instance = new CreateBilling($monthlyBillFactory);
        }

        return self::$instance;
    }

    public function getBill(User $user,array $attributes = [])
    {
        return $this->monthlyBillFactory->getMonthlyBill($user,$attributes);
    }
}
