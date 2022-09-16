<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Team;
use Carbon\Carbon;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = Event::orderBy('id', 'desc')->get();
       return view('Event.index',compact('events'));
    }

    public function eventwithschedule()
    {
        $events = Event::whereDate('start_date','>=',Carbon::createFromFormat('Y-m-d', date('Y-m-d')))->with('schedules')->orderBy('id', 'desc')->get();
        
        foreach($events as $event){
            foreach($event->schedules as $schedule){
                $team1 = Team::where('id','=', $schedule->team_1)->first();
                $schedule->teamOne = $team1->name;
                $schedule->iconOne = $team1->logo;
                $team2 = Team::where('id','=', $schedule->team_2)->first();
                $schedule->teamTwo = $team2->name;
                $schedule->icoTwo = $team2->logo;
            }
        }

        return view('Dashboard.index',compact('events'));
    }

    public function EventSchedule($id)
    {
        $events = Event::where('id','=',$id)->with('schedules')->first();

        foreach($events->schedules as $event){
            $team1 = Team::where('id','=', $event->team_1)->first();
            $event->teamOne = $team1->name;
            $team2 = Team::where('id','=', $event->team_2)->first();
            $event->teamTwo = $team2->name;
            
        }
        return view('Event.event-schedule',compact('events'));
    }

    public function EventTeam($id)
    {
        $teams = Event::where('id','=',$id)->with('teams')->first();
        
        return view('Team.index',compact('teams'));
    }

    public function EventQuestions($id)
    {
        $events = Event::where('id','=',$id)->with('teams')->first();
        return json_encode([
            'message'=>'record found!',
            'success'=>$events
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
        if(!Auth::User()->can('write-event')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'host_country' => 'required'
         ]);
   
         if($validator->fails()){
            return redirect()->route('events.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $event = Event::create(
            array(
                'name' => $request->name,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'host_country' => $request->host_country
            )
        );

        return redirect()->route('events.list')->with('success','Event created Successfully.');
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
        $event = Event::where('id','=',$id)->first();
        return view('Event.edit',compact('event'));
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
        if(!Auth::User()->can('write-event')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Event::where('id','=',$id)->update(
            array(
                'name' => $request->name,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'host_country' => $request->host_country
            )
        );

        return redirect()->route('events.list')->with('success','Event updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-event')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }
        
        Event::where('id','=',$id)->delete();
        return redirect()->route('events.list')->with('success','Event deleted Successfully.');
    }
}
