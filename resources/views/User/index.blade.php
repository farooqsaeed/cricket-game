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
                         <a class="btn btn-sm btn-success " href="{{ URL('users/create') }}">
                         <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> User</a>
                    </div>
                    <div class="header">
                        <h2><strong>All
                        </strong> Users </h2>
                    </div>
                    
                    <div class="body">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Permissions
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>1</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td style="width: 16.66%">
                                        @foreach($user->permissions as $permission)
                                        <span class="badge badge-success">{{$permission->slug}}</span><br>
                                        @endforeach
                                        
                                        
                                    </td>
                                    <td>
                                        <a href="{{ URL('users/edit') }}/{{$user->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                        <a 
                                        onclick="return confirm('are you sure you want to delete this ?')"; 
                                        href="{{ URL('users/delete') }}/{{$user->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>
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