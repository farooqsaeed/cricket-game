@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
    <!-- match cards -->
    <div class="col-lg-12">
        <div class="card">
            <div class="body align-center">
                <div class="row">
                    <div class="col-12">
                        <h2><strong>{{$event->name}}</strong></h2>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="card">
                 <a href="{{ URL('events/schedule')}}/{{$event->id}}">
                 <div class="body align-center">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ URL::asset('assets/images/icon/event_ic1.png') }}" width="100" height="90">
                            <h1><strong>Schedule</strong></h1>
                            <p>Set matches schedules</p>
                        </div>
                    </div>
                 </div> 
                 </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                 <a href="{{ URL('events/teams')}}/{{$event->id}}">   
                 <div class="body align-center">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ URL::asset('assets/images/icon/event_ic2.png') }}" width="100" height="90">
                            <h1><strong>Teams</strong></h1>
                            <p>Set matche Teams</p>
                        </div>
                    </div>
                 </div>
                 </a> 
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="card">
                 <a href="{{ URL('challenge/list')}}">   
                 <div class="body align-center">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ URL::asset('assets/images/icon/event_ic3.png') }}" width="100" height="90">
                            <h1><strong>Challenges</strong></h1>
                            <p>Set matche challenges</p>
                        </div>
                    </div>
                 </div>
                 </a> 
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                <a href="{{ URL('questions/list')}}">   
                 <div class="body align-center">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ URL::asset('assets/images/icon/event_ic4.png') }}" width="100" height="90">
                            <h1><strong>Questions</strong></h1>
                            <p>Set matche questions</p>
                        </div>
                    </div>
                 </div>

                 </a> 
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
    <!-- match card end -->
            

    </div>
</div>    
@endsection