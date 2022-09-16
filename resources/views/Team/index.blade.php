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
                                <h2><strong>{{$teams->name}}</strong></h2>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-lg-12 col-md-12 
            text-right">
                <a class="btn btn-sm btn-success " href="{{ URL('teams/create') }}/{{$teams->id}}">
                <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Team</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Flag</th>
                                    <th>Team</th>
                                    <th>Nick</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams->teams as $team)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{ URL::asset($team->logo) }}" height="30" width="50">
                                    </td>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->nick}}</td>
                                    <td>
                                        <a href="{{URL('teams/edit')}}/{{$team->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                        <a
                                        onclick="return confirm('are you sure you want to delete this ?')"; href="{{ URL('teams/delete') }}/{{$team->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
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