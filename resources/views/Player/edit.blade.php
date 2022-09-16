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
                        </strong> player </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/player/update') }}/{{ $player->id }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Team</label>
                                    <select class="form-control z-index show-tick" name="team_id" data-live-search="true"
                                    required>
                                      @foreach($teams as $team)
                                      <option 
                                      <?=$team->id == $player->team_id ? ' selected="selected"' : '';?>
                                      value="{{$team->id}}">{{$team->name}}
                                      </option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Name</label>
                                     <input type="text" class="form-control" name="name"
                                     value="{{ $player->name }}">
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