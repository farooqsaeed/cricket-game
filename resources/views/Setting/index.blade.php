@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
    <!-- match cards -->
    @include('success')
    <div class="col-lg-12 col-md-12 text-right">
        <a class="btn btn-sm btn-success" 
        href="{{ URL('settings/change-password') }}">
        <i class="zmdi zmdi-lock"></i> </a>

        <a class="btn btn-sm btn-warning" 
        href="{{ URL('settings/edit') }}">
        <i class="zmdi zmdi-edit"></i> Edit</a>

        <a onclick="return confirm('are you sure you want to delete this ?')"; class="btn btn-sm btn-dangar " href="{{ URL('settings/delete-profile') }}">
        <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Delete Account</a>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        
        <div class="card">
            <div class="body align-center">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ URL::asset('assets/images/user.png') }}" alt="logo" width="200" height="200" style=" border-radius: 50%;">

                        <h2 class="mt-5"><strong>{{Auth::User()->name}}</strong></h2>
                        <p>{{Auth::User()->role}}</p>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="text-right">
                                    <p><strong>Username</strong></p>
                                    <p><strong>Email</strong></p>
                                    <p><strong>Role</strong></p>
                                    <p><strong>Permissions</strong></p>
                                </div>
                                
                            </div>
                            <div class="col-lg-9">
                                <div class="text-left">
                                    <p>{{Auth::User()->name}}</p>
                                    <p>{{Auth::User()->email}}</p>
                                    <p>{{Auth::User()->role}}</p>
                                    <p><span class="badge badge-primary">Question</span> <span class="badge badge-primary">Question</span></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        
    </div>
    <div class="col-lg-2"></div>
    <!-- match card end -->
            

    </div>
</div>    
@endsection