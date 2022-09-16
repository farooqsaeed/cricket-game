@extends('layouts.app')

@section('title', 'Home')


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
                        </strong> team </h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/teams/update') }}/{{$team->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                            <input type="hidden" name="event_id" value="{{$team->event_id}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                    value="{{$team->name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Nick</label>
                                    <input type="text" class="form-control" name="nick"
                                    value="{{ $team->nick }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Logo</label>
                                     <input type="file" class="form-control" name="icon">
                                </div>
                            </div>

                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE</button>
                    </div>
                  
                </form>
             </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>    
@endsection