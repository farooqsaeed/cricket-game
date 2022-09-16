@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
    <!-- match cards -->
    @include('success')
    <div class="col-lg-12 col-md-12 text-right">
        <a class="btn btn-sm btn-success " href="{{ URL('events/create') }}">
        <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Event</a>
    </div>
    @foreach($events as $event)
    <div class="col-lg-4">
        
        <div class="card">
            <div class="body align-center l-parpl">
                <a href="{{ URL('/events/feature')}}/{{$event->id}}">
                <div class="row">
                    <div class="col-12 text-white">
                        <h2><strong>{{$event->name}}</strong></h2>
                        <p>{{$event->start_date}} to {{$event->end_date}}</p>
                        <p>{{$event->host_country}}</p>
                    </div> 
                </div>
                </a>
                <div class="text-right">
                    <a href="{{ URL('events/edit') }}/{{$event->id}}" class="btn btn-warning btn-sm"><i class="zmdi zmdi-edit"></i></a>

                    <a 
                    onclick="return confirm('are you sure you want to delete this ?')"; 
                    href="{{ URL('events/delete') }}/{{$event->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
                </div>
            </div> 
        </div>
        
    </div>
    @endforeach
    <!-- match card end -->
            

    </div>
</div>    
@endsection