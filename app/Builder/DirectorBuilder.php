<?php

namespace App\Builder;

use App\Models\User;

class DirectorBuilder
{

    public function build(IUserBuilder $builder, $values)
    {
        $builder->setAttribute($values);
        $builder->setRole();

        return $builder->getUser();
    }
}
