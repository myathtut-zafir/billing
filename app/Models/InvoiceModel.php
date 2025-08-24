<?php
namespace App\Models;

use Carbon\CarbonImmutable;

class InvoiceModel
{

    public function __construct(public CarbonImmutable $dueDate, public float $amount)
    {
    }

    public function getDueDate(): CarbonImmutable
    {
        return $this->dueDate;
    }
    public function isOverdue(): bool
    {
        return $this->dueDate->isPast();
    }
    public function toArray()
    {
        return [
            'due_date' => $this->dueDate->toDateString(),
            'amount' => $this->amount,
            'is_overdue' => $this->isOverdue()
        ];

    }
}
