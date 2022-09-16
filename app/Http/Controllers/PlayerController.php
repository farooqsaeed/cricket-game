<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use App\Models\Team;
use Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::with('Team')->orderBy('id', 'desc')->get();
        return view('Player.index',compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::User()->can('write-players')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $validator = Validator::make($request->all(), [
            'team_id' => 'required',
            'name' => 'required'
         ]);
   
         if($validator->fails()){
            return redirect()->route('player.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $player = Player::create(
            array(
                'team_id' => $request->team_id,
                'name' => $request->name
            )
        );

        return redirect()->route('player.list')->with('success','Player Added Successfully.');

        
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

    public function edit($id)
    {
        $player = Player::where('id','=',$id)->first();
        $teams = Team::all();
        return view('Player.edit',compact('player','teams'));
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
        if(!Auth::User()->can('write-players')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Player::where('id','=',$id)->update([
            'team_id' => $request->team_id,
            'name' => $request->name
        ]);

        return redirect()->route('player.list')->with('success','player update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-players')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }
        
        Player::where('id','=',$id)->delete();

        return redirect()->route('player.list')->with('success','player delete successfully.');
    }
}
