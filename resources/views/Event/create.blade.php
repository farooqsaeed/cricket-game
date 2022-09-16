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
                        </strong> new event </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/events/store') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Type</label>
                                    <select 
                                    class="form-control" name="type">
                                      <option disabled selected>--Select--
                                      </option>
                                      <option>ODI World Cup
                                      </option>
                                      <option>T20 World Cup
                                      </option>
                                      <option>International Series
                                      </option>
                                      <option>Domestic
                                      </option>
                                    </select>
                                    @if ($errors->has('type'))
                                     <span class="text-danger">{{ $errors->first('type') }}</span>
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
                    
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                    value="{{ Request::old('start_date') }}">
                                    @if ($errors->has('start_date'))
                                     <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                    value="{{ Request::old('end_date') }}">
                                    @if ($errors->has('end_date'))
                                     <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                     @endif
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                      <div class="col-md-12">
                                <div class="form-group">
                                     <label>Host Country</label>
                                     <input type="text" class="form-control" name="host_country"
                                     value="{{ Request::old('host_country') }}">
                                     @if ($errors->has('host_country'))
                                     <span class="text-danger">{{ $errors->first('host_country') }}</span>
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