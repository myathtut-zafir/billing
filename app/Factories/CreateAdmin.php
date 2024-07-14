<?php

namespace App\Factories;

use App\Models\User;

class CreateAdmin
{
    public function make(array $attributes = []): User
    {
        $attributes['role'] = 'admin';
        return new User($attributes);
    }
}
