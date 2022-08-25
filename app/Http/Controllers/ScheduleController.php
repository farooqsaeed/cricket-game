<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Question;
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
            $errors = $validator->errors();
            return json_encode(['status'=>0,'errors'=>$errors]);
        }

        $schedule = Schedule::create(
            array(
                'type' => $request->type,
                'team_1' => $request->team_1,
                'team_2' => $request->team_2,
                'date_at' => $request->date_at,
                'time_at' => $request->time_at,
                'avenue' => $request->avenue,
                'event_id' => $request->event_id,
                'time_stamp' => time()
            )
        );

        $question = Question::where('id','=',1)->first();

        $schedule->questions()->attach($question);

        return json_encode([
            'message'=>'schedule created successfully',
            'success'=>$schedule
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
        $schedules = Schedule::where('event_id','=',$id)->get();
        return json_encode([
            'message'=>'Record Found!',
            'success'=>$schedules
        ],200);
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

    
}
