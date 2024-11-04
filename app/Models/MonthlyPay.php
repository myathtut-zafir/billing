<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyPay extends Model
{
    protected $table = 'monthly_pays';
    protected $fillable = [
        'user_id',
        'billing_month',
        'billing_year',
        'billing_amount',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new \App\Scopes\MonthlyPay());
    }
}
