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
        $eventName = 'All Teams';
        return view('Team.index',compact('teams','eventName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::User()->can('write-teams')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $path = null;
        // check for validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required',
            'event_id' => 'required',
            'nick' => 'required'
         ]);
        
        //  through exceptions
        if($validator->fails()){
            return redirect()->route('teams.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        // upload icon
            $image = $request->icon;
            $name = time();
            $file = $image->getClientOriginalName();
            $extension = $image->extension();
            $ImageName = $name.$file;
            $fileName = md5($ImageName);
            $fullPath =  $fileName.'.'.$extension;
            
            $image->move(public_path('uploads/logo/'),$fullPath);
            $path = 'uploads/logo/'.$fullPath;

        // store team data

        $team = Team::create(
            array(
                'name' => $request->name,
                'logo' => $path,
                'event_id' => $request->event_id,
                'nick' => $request->nick
            )
        );
        
        return redirect()->route('teams.list')->with('success','Team Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::where('id','=',$id)->first();

        return view('Team.edit',compact('team'));
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
        if(!Auth::User()->can('write-teams')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        if ($request->hasFile('icon')){
            $image = $request->icon;
            $name = time();
            $file = $image->getClientOriginalName();
            $extension = $image->extension();
            $ImageName = $name.$file;
            $fileName = md5($ImageName);
            $fullPath =  $fileName.'.'.$extension;
            
            $image->move(public_path('uploads/logo/'),$fullPath);
            $path = 'uploads/logo/'.$fullPath;
            Team::where('id','=',$id)->update([
                'logo' => $path,
                'name' => $request->name,
                'nick' => $request->nick
            ]);

        }else{

            Team::where('id','=',$id)->update([
                'name' => $request->name,
                'nick' => $request->nick
            ]);

        }

        return redirect('events/teams/'.$request->event_id)->with('success','Team updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-teams')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Team::where('id','=',$id)->delete();

        return back()->with('success','Team deleted Successfully.');
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
       $players = Team::with('players')->select('id','name','nick')->get();

       $data = array('Teams'=>$players );

       return json_encode([
        'message'=>'record found',
        'success'=>$data
       ],200);
    }
}
