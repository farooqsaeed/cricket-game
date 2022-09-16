@extends('layouts.app')

@section('title', 'Update Profile')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    
                    <div class="header">
                        <h2><strong>Update
                        </strong>Profile</h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/settings/update-profile') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" 
                                    name="name"
                                    value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Email</label>
                                    <input type="email" class="form-control" 
                                    name="email"
                                    value="{{ $user->email }}">
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