<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
       $users = User::with('permissions')->get();
       return view('User.index',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::User()->can('write-users')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
         ]);
   
        if($validator->fails()){
            return redirect()->route('users.create')
                    ->withErrors($validator)
                    ->withInput();
        }

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

        return redirect()->route('users.list')->with('success','User Added Successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id','=',$id)->with('permissions')->first();
        // return $user;
         
        return view('User.edit',compact('user')); 
    }

    public function editprofile()
    {
        $user = User::where('id','=',Auth::User()->id)->first();
        return view('Setting.edit',compact('user'));
    }

    public function updateprofile(Request $request)
    {
        User::where('id','=',Auth::User()->id)->update([
            'name' => $request->name,
            'email' => $request->email
            
        ]);
        return redirect()->route('settings.profile')->with('success','profile updated successfully.');
    }

    public function deleteprofile(Request $request)
    {
        User::where('id','=',Auth::User()->id)->delete();
        session()->flush();
        Auth::logout();

        return redirect('/');
    }

    public function updatepassword(Request $request)
    {
        if (Hash::check($request->current_password, Auth::User()->password)) {
            
            User::where('id','=',Auth::User()->id)->update([
                'password'=>bcrypt($request->password)
            ]);

            session()->flush();
            Auth::logout();
            return redirect('/');

        }else{
            return back()->with('error','you have enterd incorrect password');
        }
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
        $PermissionIds = array();
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
        foreach($Permission as $item){
           $PermissionIds[] = $item->id;
        }

        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->save();
        $User->roles()->sync([$role->id]);
        $User->permissions()->sync($PermissionIds);

        return redirect()->route('users.list')->with('success','User updated Successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::User()->can('write-users')){
            return back()->with('error','you have not the permission to perform this operation.'); 
        }

        User::where('id','=',$id)->delete();

        return redirect()->route('users.list')->with('success','User deleted Successfully.');
    }
}
