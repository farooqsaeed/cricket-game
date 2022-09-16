<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password'=> 'required'
         ]);
   
         if($validator->fails()){
            return redirect()->route('login')
                    ->withErrors($validator)
                    ->withInput();
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            // $user = Auth::user(); 
            return redirect('/dashboard/event/schedule');
            // $token = $user->createToken('api-token')->plainTextToken;
            
        }else{
            return redirect()->route('login')->with('error','email or password is incorrect');
        }
    }

}
