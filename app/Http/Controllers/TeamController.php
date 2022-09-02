<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id', 'desc')->get();
        return json_encode([
            'message'=>'record found!',
            'success'=>$teams
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
         ]);
   
        if($validator->fails()){
            $errors = $validator->errors();
            return json_encode(['status'=>0,'errors'=>$errors]);
        }

        $team = Team::create(
            array(
                'name' => $request->name,
            )
        );

        return json_encode([
            'message'=>'team created successfully',
            'success'=>$team
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
        //
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

    public function uploadicon(Request $request,$id)
    {
        if ($request->hasFile('logo')){
            $image = $request->logo;
            $name = time();
            $file = $image->getClientOriginalName();
            $extension = $image->extension();
            $ImageName = $name.$file;
            $fileName = md5($ImageName);
            $fullPath =  $fileName.'.'.$extension;
            
            $image->move(public_path('uploads/logo/'),$fullPath);
            $path = 'uploads/logo/'.$fullPath;
            Team::where('id','=',$id)->update([
                'logo'=>$path
            ]);

            return json_encode([
                'message'=>'team updated successfully',
            ],200);

        }

        return json_encode([
            'message'=>'team not found!',
        ],204);
    }

    // team with player

    public function TeamWithPlayer()
    {
       $players = Team::with('players')->select('id','name','players')->get();

       return json_encode([
        'success'=>$players
       ],200);
    }
}
