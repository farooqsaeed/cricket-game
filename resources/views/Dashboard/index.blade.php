@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
    <!-- match cards -->
    @foreach($events as $event)
    <div class="col-lg-12">
    <h1>{{$event->name}}</h1>
    </div>
    @foreach($event->schedules as $schedule)
    <div class="col-lg-6">
        <a href="{{ URL('/events/details') }}/{{$schedule->id}}">
        <div class="card">
            <div class="body align-center">

                <div class="row">
                    
                    <div class="col-6 text-left">
                        <p><img src="{{ URL::asset('assets/images/icon/trophy.png') }}" height="15" width="15"> &nbsp {{$schedule->type}}</p>
                    </div>
                    <div class="col-6 text-right">
                        <p>{{$schedule->date_at}} {{$schedule->time_at}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ URL::asset($schedule->iconOne) }}" height="30" width="50">
                            </div>
                            <div class="col-6">
                                <p>{{$schedule->teamOne}}</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <p>VS</p>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ URL::asset($schedule->icoTwo) }}" height="30" width="50">
                            </div>
                            <div class="col-6">
                                <p>{{$schedule->teamTwo}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p>{{$schedule->avenue}}</p>
                    </div>
                </div>

            </div> 
        </div>
        </a>
    </div>
    @endforeach
    @endforeach
    <!-- match card end -->
    </div>
</div>    
@endsection