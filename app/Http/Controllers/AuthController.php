<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function doLogin()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $token = $user->createToken('api-token')->plainTextToken;

            return json_encode([
                'error' => false,
                'message'=>'user login successfully',
                'token'=>$token,
                'success'=>$user
            ],200);
        }else{
            return json_encode([
                'error' => true,
                'message'=>'You have entered an invalid username or password',
            ],401);
        } 
    }

}
