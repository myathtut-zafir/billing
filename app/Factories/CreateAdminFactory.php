<?php

namespace App\Factories;

class CreateAdminFactory implements UserFactory
{

    public function getUser(array $attributes = [])
    {
        $admin= new CreateAdmin();
        $attributes=(new CreatePhone())->make(true, $attributes);
        return $admin->make($attributes);
    }
}
