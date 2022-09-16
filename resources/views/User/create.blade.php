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
                        <h2><strong>Add New
                        </strong>User</h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/users/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" 
                                    name="name"
                                    value="{{ Request::old('name') }}">
                                    @if ($errors->has('name'))
                                     <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Email</label>
                                    <input type="email" class="form-control" 
                                    name="email"
                                    value="{{ Request::old('email') }}">
                                    @if ($errors->has('email'))
                                     <span class="text-danger">{{ $errors->first('email') }}</span>
                                     @endif
                                </div>
                            </div>

                    </div>
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Password</label>
                                    <input 
                                    type="password" class="form-control" 
                                    name="password"
                                    value="{{ Request::old('password') }}">
                                    @if ($errors->has('password'))
                                     <span class="text-danger">{{ $errors->first('password') }}</span>
                                     @endif
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Role</label>
                                    <select class="form-control" name="role">
                                      <option disabled selected>--Select--
                                      </option>
                                      <option>Super-Admin
                                      </option>
                                      <option>Sub-Admin
                                      </option>
                                    </select>
                                    @if ($errors->has('role'))
                                     <span class="text-danger">{{ $errors->first('role') }}</span>
                                    @endif
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
                                     name="read_question">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-question"
                                    name="write_question">
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
                                    name="read_event">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-event"
                                    name="write_event">
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
                                    name="read_teams">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-teams"
                                    name="write_teams">
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
                                    name="read-players">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-players"
                                    name="write_players">
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
                                    name="read_challenges">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-challenges"
                                    name="write_challenges">
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
                                    name="read_users">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-users"
                                    name="write_users">
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
                                    name="read_schedule">
                                    <label>Read
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input 
                                    type="checkbox"
                                    value="write-schedule"
                                    name="write_schedule">
                                    <label>Write
                                    </label>
                                </div>

                              </div>
                          </div>
                    </div>
                    

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE</button>
                    </div>
                  
                </form>
             </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>    
@endsection