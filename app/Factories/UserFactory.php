<?php

namespace App\Factories;

use App\Models\User;

interface UserFactory
{
    public function getUser(array $attributes = []);
}
