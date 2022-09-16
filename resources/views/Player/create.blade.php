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
                        <h2><strong>Add a
                        </strong> new player </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/player/store') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Team</label>
                                    <select class="form-control z-index show-tick" name="team_id" data-live-search="true"
                                    required>
                                      <option disabled selected>--Select--
                                      </option>
                                      @foreach($teams as $team)
                                      <option 
                                      value="{{$team->id}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                                     @if ($errors->has('team_id'))
                                     <span class="text-danger">{{ $errors->first('team_id') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Name</label>
                                     <input type="text" class="form-control" name="name"
                                     value="{{ Request::old('name') }}">
                                     @if ($errors->has('name'))
                                     <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
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