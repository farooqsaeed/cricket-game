<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PermissionArray  = array(
            $request->read_question,
            $request->write_question,
            $request->read_event,
            $request->write_event,
            $request->read_teams,
            $request->write_teams,
            $request->read_players,
            $request->write_players,
            $request->read_challenges,
            $request->write_challenges,
            $request->read_users,
            $request->write_users,
            $request->read_schedule,
            $request->write_schedule
        );

        $role = Role::where('slug','=',$request->role)->first();
        $Permission = Permission::whereIn('slug', $PermissionArray)->get();
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->password = bcrypt($request->password);
        $User->save();
        $User->roles()->attach($role);
        $User->permissions()->attach($Permission);

        return json_encode([
            'message'=>'user created successfully',
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
