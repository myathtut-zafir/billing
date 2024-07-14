<?php

namespace App\Factories;

use App\Models\User;

class CreateCustomer
{
    public function make(array $attributes = []): User
    {
        $attributes['role'] = 'customer';
        return new User($attributes);
    }
}
