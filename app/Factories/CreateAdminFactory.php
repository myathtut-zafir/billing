<?php

namespace App\Factories;

class CreateAdminFactory implements UserFactory
{

    public function getUser(array $attributes = [])
    {
        $admin= new CreateAdmin();
        return $admin->make($attributes);
    }
}
