<?php

namespace App\Http\Controllers;

use App\Factories\CreateAdminFactory;
use App\Factories\CreateCustomerFactory;
use App\Factories\CreateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $createCustomer = CreateUser::getInstance(new CreateCustomerFactory());
        $data=$createCustomer->getUser($request->all());

         User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role']
         ]);

    }
}
