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
                        </strong> new challenge </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/challenge/store') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Overs</label>
                                    <input type="number" class="form-control" name="overs"
                                    value="{{ Request::old('overs') }}">
                                    @if ($errors->has('overs'))
                                     <span class="text-danger">{{ $errors->first('overs') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Runs</label>
                                    <input type="number" class="form-control" name="runs"
                                    value="{{ Request::old('runs') }}">
                                    @if ($errors->has('runs'))
                                     <span class="text-danger">{{ $errors->first('runs') }}</span>
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