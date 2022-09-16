<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Question;
use App\Models\Team;
use Validator;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::createFromFormat('Y-m-d', '2021-11-16');
        $result = Schedule::whereDate('date_at','=',$date)->with('questions')->get();
        return json_encode(['success'=>$result],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if(!Auth::User()->can('write-schedule')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'team_1' => 'required',
            'team_2' => 'required',
            'date_at' => 'required',
            'time_at' => 'required',
            'avenue' => 'required',
            'event_id' => 'required'
         ]);
   
        if($validator->fails()){
            return redirect('/events/create-schedule/'.$request->event_id)
            ->withErrors($validator)
            ->withInput();
        }

        $schedule = Schedule::create(
            array(
                'M_type' => $request->type,
                'team_1' => $request->team_1,
                'team_2' => $request->team_2,
                'date_at' => $request->date_at,
                'time_at' => $request->time_at,
                'avenue' => $request->avenue,
                'event_id' => $request->event_id,
                'time_stamp' => time()
            )
        );

       

        return redirect('/events/schedule/'.$request->event_id)->with('success','Schedule Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = Team::where('id','=',$id)->get();
        $schedules = Schedule::where('id','=',$id)->first();
        return view('Event.editSchedule',compact('schedules','teams','id'));
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
        if(!Auth::User()->can('write-schedule')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }
        
        $schedule = Schedule::where('id','=',$id)->update(
            array(
                'M_type' => $request->type,
                'team_1' => $request->team_1,
                'team_2' => $request->team_2,
                'date_at' => $request->date_at,
                'time_at' => $request->time_at,
                'avenue' => $request->avenue,
                'event_id' => $request->event_id,
            )
        );

        return redirect('/events/schedule/'.$request->event_id)->with('success','Schedule updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-schedule')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Schedule::where('id','=',$id)->delete();

        return back()->with('success','Schedule deleted Successfully.');
    }

    
}
