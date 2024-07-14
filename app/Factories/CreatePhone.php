<?php

namespace App\Factories;
class CreatePhone
{
    public function make($isAdmin = false, array $attributes = []): array
    {
        if ($isAdmin) {
            $attributes['phone'] = '1234567890';
        } else {
            $attributes['phone'] = '5555555';
        }

        return $attributes;
    }

}
