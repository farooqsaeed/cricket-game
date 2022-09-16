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
                        </strong> event </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/events/update') }}/{{$event->id}}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Type</label>
                                    <select 
                                    class="form-control" name="type">
                                      <option 
                                      <?=$event->type == 'ODI World Cup' ? ' selected="selected"' : '';?>
                                      >ODI World Cup
                                      </option>
                                      <option
                                      <?=$event->type == 'T20 World Cup' ? ' selected="selected"' : '';?>
                                      >T20 World Cup
                                      </option>
                                      <option
                                      <?=$event->type == 'International Series' ? ' selected="selected"' : '';?>
                                      >International Series
                                      </option>
                                      <option
                                      <?=$event->type == 'Domestic' ? ' selected="selected"' : '';?>
                                      >Domestic
                                      </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Name</label>
                                     <input type="text" class="form-control" name="name"
                                     value="{{ $event->name }}">
                                </div>
                            </div>

                    </div>
                    
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                    value="{{ $event->start_date }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                    value="{{ $event->end_date }}">
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                      <div class="col-md-12">
                                <div class="form-group">
                                     <label>Host Country</label>
                                     <input type="text" class="form-control" name="host_country"
                                     value="{{ $event->host_country }}">
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