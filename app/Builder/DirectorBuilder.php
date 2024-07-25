<?php

namespace App\Builder;

use App\Models\User;

class DirectorBuilder
{

    public function build(IUserBuilder $builder, $values)
    {
        return $builder->setAttribute($values)->setRole()->getUser();

    }
}
