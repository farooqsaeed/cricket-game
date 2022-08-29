<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Gamer;
use App\Models\Gamer_point;
use Validator;


class GamerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $response = Gamer::with('Gamer_point')->where('id','=',Auth::User()->id)->first();
       return json_encode([
        'message'=>'user found!',
        'success'=>$response
       ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // profile_image
        $path = null;
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'nick'=> 'required',
           'city' => 'required',
           'country' => 'required',
           'phone' => 'required|unique:gamers',
           'fvt_team'=>'required',
           'social_id' =>'required'
        ]);
  
       if($validator->fails()){
           $errors = $validator->errors();
           return json_encode(['status'=>0,'errors'=>$errors]);
       }

       if ($request->hasFile('profile_image')){
           $image = $request->profile_image;
           $name = time();
           $file = $image->getClientOriginalName();
           $extension = $image->extension();
           $ImageName = $name.$file;
           $fileName = md5($ImageName);
           $fullPath =  $fileName.'.'.$extension;
           
           $image->move(public_path('uploads/profile/'),$fullPath);
           $path = 'uploads/profile/'.$fullPath;
       }

                                                            
       $gamer = Gamer::create(
           array(
               'profile_image'=>$path,
               'name' => $request->name,
               'nick' => $request->nick,
               'city'=> $request->city,
               'country' => $request->country,
               'phone' => $request->phone,
               'fvt_team' => $request->fvt_team,
               'type'=>'Free',
               'social_id'=> $request->social_id
           )
       );

       $token = $gamer->createToken('api-token')->plainTextToken;

       return json_encode([
           'message'=>'user registered successfully',
           'token'=>$token,
           'success'=>$gamer
       ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Gamer::where('social_id','=',$id)->first();
        if(!empty($user)){
            $token = $user->createToken('api-token')->plainTextToken;

            return json_encode([
                'message'=>'user found!',
                'token'=>$token,
                'success'=>$user
            ],200);
        }

        return json_encode([
            'message'=>'user record not found!',
        ],204);
        

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function isUserExist($id)
    {
        $user = Gamer::where('id','=',$id)->first();
        

        if(!empty($user)){
            $token = $user->createToken('api-token')->plainTextToken;
            return json_encode([
                'message'=>'user found!',
                'token'=>$token,
                'success'=>$user
            ]);
        }

        return json_encode([
            'message'=>'user record not found!',
        ],204);
    }
}
