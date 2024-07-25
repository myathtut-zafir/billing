<?php

namespace App\Builder;
interface IUserBuilder
{
    public function setAttribute(array $values);
    public function setRole();
    public function getUser();
}
