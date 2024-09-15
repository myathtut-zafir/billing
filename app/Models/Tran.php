<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tran extends Model
{
    protected $fillable = [
        'user_id',
        'payment_type_id',
        'amount',
        'month',
        'year',
    ];
}
