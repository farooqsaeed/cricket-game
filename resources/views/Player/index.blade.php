@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('success')
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12 col-md-12 text-right">
                         <a class="btn btn-sm btn-success " href="{{ URL('player/create') }}">
                         <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Player</a>
                    </div>
                    <div class="header">
                        <h2><strong>Player
                        </strong> With Teams </h2>
                    </div>
                    
                    <div class="body">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Player</th>
                                    <th>Team</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$player->name}}</td>
                                    <td>
                                        @if(!empty($player->team))
                                        {{$player->team->name}}
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ URL('player/edit') }}/{{$player->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                    <a onclick="return confirm('are you sure you want to delete this ?')";
                                    href="{{ URL('player/delete') }}/{{$player->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
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