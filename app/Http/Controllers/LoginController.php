<?php

namespace App\Http\Controllers;

use App\Builder\CustomerBuilder;
use App\Builder\DirectorBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return ['success'=>$success];
        }else{
            return ['error'=>'Unauthorised'];
        }



    }
}
