<?php

namespace App\Builder;

use App\Models\User;

class CustomerBuilder implements IUserBuilder
{


    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function setAttribute(array $values)
    {
        $this->user->setEmail($values['email']);
        $this->user->setPassword($values['password']);
        $this->user->setName($values['name']);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setRole()
    {
        $this->user->setRole("customer");
    }
}
