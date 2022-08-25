<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Schedule;
use App\Models\Gamer;
use Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = Question::orderBy('id','DESC')->get();
       return json_encode([
            'message'=>'Record Found!',
            'success'=>$result
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
            'point_category_id' => 'required',
            'schedule_id' => 'required',
            'Qn' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'type' => 'required',
            'timebound' => 'required'
         ]);
   
        if($validator->fails()){
            $errors = $validator->errors();
            return json_encode(['status'=>0,'errors'=>$errors]);
        }

        $question = Question::create(
            array(
                'point_category_id' => $request->point_category_id,
                'schedule_id' => $request->schedule_id,
                'Qn' => $request->Qn,
                'option_1' => $request->option_1,
                'option_2' => $request->option_2,
                'option_3' => $request->option_3,
                'option_4' => $request->option_4,
                'type' => $request->type,
                'timebound' => $request->timebound
            )
        );

        return json_encode([
            'message'=>'Question created successfully',
            'success'=>$question
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
        $users = array();
        $usersId = array();
        $QnId = array();
        $answers = Answer::where('status','=',true)
        ->with(['point_category' => function($query){
            $query->sum('No');
         }])->get();

         $count = count($answers);
         for ($i=0; $i < $count; $i++) { 
             
             if ($i==0) {
                $gamer = Gamer::where('id','=',$answers[$i]->gamer_id)->first();
                if (!empty($gamer)) {
                  $usersId['profile_image'] = $gamer->profile_image; 
                  $usersId['name'] = $gamer->name; 
                  $usersId['city'] = $gamer->city;  
                }
                $usersId['gamer_id'] = $answers[$i]->gamer_id;
                $usersId['points'] = $answers[$i]->point_category->No;
                $users[] = $usersId;
             }else{
                 if ($answers[$i-1]->gamer_id!=$answers[$i]->gamer_id) {
                        $gamer = Gamer::where('id','=',$answers[$i]->gamer_id)->first();
                        if (!empty($gamer)) {
                        $usersId['profile_image'] = $gamer->profile_image; 
                        $usersId['name'] = $gamer->name; 
                        $usersId['city'] = $gamer->city;  
                        }
                     $usersId['gamer_id'] = $answers[$i]->gamer_id;
                     $usersId['points'] = $answers[$i]->point_category->No;
                     $users[] = $usersId;
                 }
                 else{
                     $users[$i-1]['points'] = $users[$i-1]['points']+$answers[$i]->point_category->No;
                 }
             }
        }
        
        $schedule = Schedule::where('id','=',$id)->with('questions')->get(); 
        $items = $schedule[0]->questions;
        foreach($items as $item){
            $QnId[] = $item->pivot->question_id;
        }
        $result = Question::whereIn('id',$QnId)->select('id','Qn')->withCount('answers')->get();

        return json_encode([
            'message'=>'Record Found',
            'success'=>$result,
            'winners'=>$users
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
