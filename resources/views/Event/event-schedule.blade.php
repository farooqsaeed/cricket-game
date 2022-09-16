@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('success')
            <div class="col-lg-12">
                <div class="card">
                    <div class="body align-center">
                        <div class="row">
                            <div class="col-12">
                                <h2><strong>{{$events->name}}</strong></h2>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12 col-md-12 text-right">
                         <a class="btn btn-sm btn-success " 
                         href="{{ URL('events/create-schedule') }}/{{$events->id}}">
                         <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Schedule</a>
                    </div>
                <div class="card">
                    <div class="body">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Teams</th>
                                    <th>Date & Time
                                    </th>
                                    <th>Avenue</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events->schedules as $event)
                                <tr>
                                    <td>{{$loop->iteration}}
                                    </td>
                                    <td>{{$event->M_type}}
                                    </td>
                                    <td>{{$event->teamOne}} vs {{$event->teamTwo}}
                                    </td>
                                    <td>{{$event->date_at}} {{$event->time_at}}
                                    </td>
                                    <td>{{$event->avenue}}</td>
                                    <td>
                                        <a href="{{ URL('events/edit') }}/{{$event->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>

                                        <a onclick="return confirm('are you sure you want to delete this ?')"; href="{{ URL('events/delete/schedule')}}/{{$event->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>    
@endsection