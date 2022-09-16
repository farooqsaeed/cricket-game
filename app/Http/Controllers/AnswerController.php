<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\Question;
use Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Auth::User()->id;
        foreach($request->answers as $key => $result){
               $result = Question::where('id','=',$result['question_id'])->first();
                Answer::create(
                    array(
                        'gamer_id' => Auth::User()->id,
                        'question_id' => $result['question_id'],
                        'respond_answer' => $result['respond_answer'],
                        'point_category_id' => $result->point_category_id
                    )
                );
        }

        return json_encode([
            'message'=>'Your answeres stored successfully',
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
    public function update(Request $request)
    {
        if(!Auth::User()->can('write-question')){
            return back()->with('error','you have not the permission to perform this operation'); 
        }

        $update = Question::where('id','=',$request->id)->update([
            'correct_option'=>$request->correct_option
        ]);

        if($update){
            Answer::where('question_id','=',$request->id)
            ->where('respond_answer','=',$request->correct_option)->update([
                'status'=>true
            ]);
        }

        return back()->with('success','answer stored successfully'); 

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
