@extends('layouts.app')

@section('title', 'Update Profile')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('error')
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    
                    <div class="header">
                        <h2><strong>Update
                        </strong>Password</h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/settings/update-password') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>current password</label>
                                <input 
                                type="password" 
                                class="form-control" 
                                name="current_password"
                                >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>new password</label>
                                <input 
                                type="password" 
                                class="form-control" 
                                name="password"
                                >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <label>confirm password</label>
                                <input 
                                type="password" 
                                class="form-control" 
                                name="c_password">
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