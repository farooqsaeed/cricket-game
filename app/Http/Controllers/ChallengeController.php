<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Challenge;
use Validator;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $challenges = Challenge::all();
       return view('Challenge.index',compact('challenges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::User()->can('write-challenges')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $validator = Validator::make($request->all(), [
            'overs' => 'required',
            'runs'=> 'required',
         ]);
        
   
        if($validator->fails()){
            return redirect()->route('challenge.create')
                    ->withErrors($validator)
                    ->withInput();
        }
   

        $challenge = Challenge::create(
            array(
                'overs' => $request->overs,
                'runs' => $request->runs
            )
        );

        return redirect()->route('challenge.list')->with('success','Challenge Added Successfully.');
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
       $challenge = Challenge::where('id','=',$id)->first();
        return view('Challenge.edit',compact('challenge'));
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
        Challenge::where('id','=',$id)->update(
            array(
                'overs' => $request->overs,
                'runs' => $request->runs
            )
        );

        return redirect()->route('challenge.list')->with('success','Challenge Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-challenges')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }
        
        Challenge::where('id','=',$id)->delete();
        return redirect()->route('challenge.list')->with('success','Challenge deleted Successfully.');
    }
}
