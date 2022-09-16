<?php 
function checkId($permissions,$id)
{
    foreach ( $permissions as $element ) {
        if ( $id == $element->id ) {
            return true;
        }
    }

    return false;
}
?>
@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('error')
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    
                    <div class="header">
                        <h2><strong>Update
                        </strong>User</h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/users/update') }}/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" 
                                    name="name"
                                    value="{{ $user->name }}">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control"name="email"
                                value="{{ $user->email }}">  
                                </div>
                            </div>

                    </div>
                    
                    <div class="row clearfix">
                            <div class="col-md-12">
                              <div 
                              class="form-group">
                                <label>Role</label>
                                    <select class="form-control" name="role">
                                      <option
                                      <?=$user->role == 'Super-Admin' ? ' selected="selected"' : '';?>
                                      >Super-Admin
                                      </option>
                                      <option
                                      <?=$user->role == 'Sub-Admin' ? 'selected="selected"' : '';?>
                                      >Sub-Admin
                                      </option>
                                    </select>
                            
                              </div>
                            </div>
                    </div>

                    <div class="row clearfix">
                          <div class="col-md-12">
                              <strong>Permissions</strong>
                              <div class="row m-3">
                                <!-- select all -->
                                <div class="col-4">
                                  <strong>Select</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    class="selectall">
                                    <label>All
                                    </label>
                                </div>
                                <div class="col-4">
                                </div>
                                <!-- question permission -->
                                <div class="col-4">
                                  <strong>Question</strong>
                                </div>
                                <div class="col-4">
                                     <input 
                                     type="checkbox"
                                     value="read-question"
                                     name="read_question"
                                    <?=
                                      checkId($user->permissions,1)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-question"
                                    name="write_question"
                                      <?=
                                        checkId($user->permissions,2)  == true ? ' checked="checked"' : '';
                                     ?>>
                                    <label>Write
                                    </label>
                                </div>
                                <!-- event permission -->
                                <div class="col-4">
                                  <strong>Event</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-event"
                                    name="read_event"
                                    <?=
                                     checkId($user->permissions,3)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-event"
                                    name="write_event"
                                    <?=
                                     checkId($user->permissions,4)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Write
                                    </label>
                                </div>
                                <!-- teams permission -->
                                <div class="col-4">
                                  <strong>Teams</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-teams"
                                    name="read_teams"
                                    <?=
                                     checkId($user->permissions,5)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-teams"
                                    name="write_teams"
                                    <?=
                                     checkId($user->permissions,6)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Write
                                    </label>
                                </div>
                                <!-- players permission -->
                                <div class="col-4">
                                  <strong>Players</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-players"
                                    name="read_players"
                                    <?=
                                     checkId($user->permissions,7)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-players"
                                    name="write_players"
                                    <?=
                                     checkId($user->permissions,8)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Write
                                    </label>
                                </div>
                                <!-- challenges permission -->
                                <div class="col-4">
                                  <strong>Challenges</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-challenges"
                                    name="read_challenges"
                                    <?=
                                     checkId($user->permissions,9)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-challenges"
                                    name="write_challenges"
                                    <?=
                                     checkId($user->permissions,10)  == true ? ' checked="checked"' : '';
                                     ?>>
                                    <label>Write
                                    </label>
                                </div>

                                <!-- users permission -->
                                <div class="col-4">
                                  <strong>Users</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-users"
                                    name="read_users"
                                    <?=
                                     checkId($user->permissions,11)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-users"
                                    name="write_users"
                                    <?=
                                     checkId($user->permissions,12)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Write
                                    </label>
                                </div>

                                <!-- schedule permission -->
                                <div class="col-4">
                                  <strong>Schedule</strong>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="read-schedule"
                                    name="read_schedule"
                                    <?=
                                     checkId($user->permissions,13)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-schedule"
                                    name="write_schedule"
                                    <?=
                                     checkId($user->permissions,14)  == true ? ' checked="checked"' : '';
                                     ?>
                                     >
                                    <label>Write
                                    </label>
                                </div>

                              </div>
                          </div>
                    </div>
                    

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">UPDATE</button>
                    </div>
                  
                </form>
             </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>    
@endsection