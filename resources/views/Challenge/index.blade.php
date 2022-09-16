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
                         <a class="btn btn-sm btn-success " href="{{ URL('challenge/create') }}">
                         <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Challenge</a>
                    </div>
                    <div class="header">
                        <h2><strong>Game
                        </strong> Challenges </h2>
                    </div>
                    
                    <div class="body">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Over</th>
                                    <th>Runs</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($challenges as $challenge)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$challenge->overs}}</td>
                                    <td>{{$challenge->runs}}</td>
                                    <td>
                                        <a href="{{ URL('challenge/edit') }}/{{$challenge->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                        <a onclick="return confirm('are you sure you want to delete this ?')"; 
                                        href="{{ URL('challenge/delete') }}/{{$challenge->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
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