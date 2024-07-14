<?php

namespace App\Factories;

class CreateCustomerFactory implements UserFactory
{

    public function getUser(array $attributes = [])
    {
        $customer = new CreateCustomer();
        return $customer->make($attributes);
    }
}
