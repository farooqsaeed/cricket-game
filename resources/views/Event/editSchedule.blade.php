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
                    <form action="{{ URL('/events/update/schedule') }}/{{$id}}" method="post">
                    @csrf
                    <div class="row clearfix">
                      <div class="col-md-12">
                              <input type="hidden" name="event_id" value="{{$schedules->event_id}}">
                                <div class="form-group">
                                     <label>Type</label>
                                    <select 
                                    class="form-control" name="type">
                                      <option
                                      <?=$schedules->M_type == 'T20' ? ' selected="selected"' : '';?>
                                      >T20
                                      </option>
                                      <option
                                      <?=$schedules->M_type == 'ODI' ? ' selected="selected"' : '';?>
                                      >ODI
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
                                      
                                      @foreach($teams as $team)
                                      <option <?=$team->id == $schedules->team_1 ? ' selected="selected"' : '';?> value="{{$schedules->team_1}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                              <strong class="mt-2">VS</strong>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                     <select 
                                    class="form-control" name="team_2">
                                      @foreach($teams as $team)
                                      <option
                                      <?=$team->id == $schedules->team_2 ? ' selected="selected"' : '';?> value="{{$schedules->team_2}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                            
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
                                    value="{{ $schedules->date_at}}">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input 
                                    type="time" 
                                    class="form-control" name="time_at"
                                    value="{{ $schedules->time_at }}">
                                    
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
                                    value="{{ $schedules->avenue }}">
                                    
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