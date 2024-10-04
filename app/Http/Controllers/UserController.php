<?php

namespace App\Http\Controllers;

use App\Builder\AdminBuilder;
use App\Builder\CustomerBuilder;
use App\Builder\DirectorBuilder;
use App\Factories\CreateAdminFactory;
use App\Factories\CreateCustomerFactory;
use App\Factories\CreateUser;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(UserRequest $request)
    {

        //factory pattern
//        $createCustomer = CreateUser::getInstance(new CreateCustomerFactory());
//        $data=$createCustomer->getUser($request->all());
//
//         User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => $data['password'],
//            'role' => $data['role']
//         ]);

        //builder pattern
        $director = new DirectorBuilder();
        $user = $director->build(new CustomerBuilder(), $request->all());
//        return $user;
        $user->save();



    }
}
