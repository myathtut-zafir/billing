<?php

namespace App\Factories;

class CreateCustomerFactory implements UserFactory
{

    public function getUser(array $attributes = [])
    {

        $customer = new CreateCustomer();
        $attributes=(new CreatePhone())->make(false, $attributes);

        return $customer->make($attributes);
    }
}
