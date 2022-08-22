<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
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
       return json_encode([
        'message'=>'record found!',
        'success'=>$events
       ],200);
    }

    public function eventwithschedule()
    {
        $events = Event::whereDate('start_date','>=',Carbon::createFromFormat('Y-m-d', date('Y-m-d')))->with('schedules')->orderBy('id', 'desc')->get();
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required'
         ]);
   
        if($validator->fails()){
            $errors = $validator->errors();
            return json_encode(['status'=>0,'errors'=>$errors]);
        }

        $event = Event::create(
            array(
                'name' => $request->name,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            )
        );

        return json_encode([
            'message'=>'event created successfully',
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
}
