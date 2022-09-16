<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Schedule;
use App\Models\Gamer;
use App\Models\point_category;
use Carbon\Carbon;
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
       $actives = Question::where('is_Active','=',true)->orderBy('id','DESC')->get();
       $inactives = Question::where('is_Active','=',false)->orderBy('id','DESC')->get();
       return view('Question.index',compact('actives','inactives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $validator = Validator::make($request->all(), [
            'point_category_id' => 'required',
            'question' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'type' => 'required',
            'timebound' => 'required'
         ]);
   
        if($validator->fails()){
            return redirect()->route('events.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $question = Question::create(
            array(
                'point_category_id' => $request->point_category_id,
                'schedule_id' => $request->schedule_id,
                'Qn' => $request->question,
                'option_1' => $request->option_1,
                'option_2' => $request->option_2,
                'option_3' => $request->option_3,
                'option_4' => $request->option_4,
                'type' => $request->type,
                'timebound' => $request->timebound
            )
        );

        return redirect()->route('questions.list')->with('success','Question Added Successfully.');
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
        $users = array();
        $usersId = array();
        $QnId = array();

        $result = Question::where('is_Active','=',true)->withCount('answers')->get();

        $answers = Answer::where('status','=',true)->whereDate('created_at', Carbon::today())
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

        // $high = max($users);
        $collection = collect($users);
        $sorted = $collection->sortDesc();
        $winners = $sorted->all();
        return view('Dashboard.winners',compact('result','winners')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Question::where('id','=',$request->id)->update([
            'Qn' => $request->Qn,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'timebound' => $request->timebound,
            'type' => $request->type
        ]);

        return redirect()->route('questions.list')->with('success','Question updated Successfully.');
    }

    public function edit($id)
    {
        $question =  Question::where('id','=',$id)->first();
        return view('Question.edit',compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        Question::where('id','=',$id)->delete();

        return redirect()->route('questions.list')->with('success','Question deleted Successfully.');
    }

   

    public function activeBulk(Request $request)
    {
        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $ids = $request->ids;
        $no = explode(",",$ids);

        Question::whereIn('id',$no)->update([
            'is_Active' => true
        ]);

        return response()->json(['success'=>"questions activeted successfully."]);
    }

    public function inactiveBulk(Request $request)
    {
        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        $ids = $request->ids;
        $no = explode(",",$ids);

        Question::whereIn('id',$no)->update([
            'is_Active' => false
        ]);

        return response()->json(['success'=>"questions deactiveted successfully."]);
    }

    public function getOptions($id)
    {
       $questions = Question::where('id','=',$id)->first();
       return json_encode(['success'=>$questions]);
    }
}
