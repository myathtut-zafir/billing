<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class N8n extends Model
{
    protected $table = 'n8ns';
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

}
