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
                        <h2><strong>Add Match 
                        </strong> Schedule </h2>
                    </div>
                  
                    <div class="body">
                    <form action="{{ URL('/events/store/schedule') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                      <div class="col-md-12">
                              <input type="hidden" name="event_id" value="{{$id}}">
                                <div class="form-group">
                                     <label>Type</label>
                                    <select 
                                    class="form-control" name="type">
                                      <option>T20
                                      </option>
                                      <option>ODI
                                      </option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                     <select 
                                    class="form-control" name="team_1">
                                      <option disabled selected>--Select--</option>
                                      @foreach($teams as $team)
                                      <option value="{{$team->id}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                                    @if ($errors->has('team_1'))
                                     <span class="text-danger">{{ $errors->first('team_1') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                              <strong class="mt-2">VS</strong>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                     <select 
                                    class="form-control" name="team_2">
                                    <option disabled selected>--Select--</option>
                                      @foreach($teams as $team)
                                      <option value="{{$team->id}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                                    @if ($errors->has('team_2'))
                                     <span class="text-danger">{{ $errors->first('team_2') }}</span>
                                     @endif
                                </div>
                            </div>

                    </div>
                    
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input 
                                    type="date" 
                                    class="form-control" name="date_at"
                                    value="{{ Request::old('date_at') }}">
                                    @if ($errors->has('date_at'))
                                     <span class="text-danger">{{ $errors->first('date_at') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input 
                                    type="time" 
                                    class="form-control" name="time_at"
                                    value="{{ Request::old('time_at') }}">
                                    @if ($errors->has('time_at'))
                                     <span class="text-danger">{{ $errors->first('time_at') }}</span>
                                     @endif
                                </div>
                            </div>
                    </div>

                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Avenue</label>
                                    <input 
                                    type="text" 
                                    class="form-control" name="avenue"
                                    value="{{ Request::old('avenue') }}">
                                    @if ($errors->has('avenue'))
                                     <span class="text-danger">{{ $errors->first('avenue') }}</span>
                                     @endif
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