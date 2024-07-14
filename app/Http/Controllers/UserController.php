<?php

namespace App\Http\Controllers;

use App\Factories\CreateAdminFactory;
use App\Factories\CreateCustomerFactory;
use App\Factories\CreateUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {

        $createCustomer = CreateUser::getInstance(new CreateAdminFactory());
        return $createCustomer->getUser($request->all());

    }
}
