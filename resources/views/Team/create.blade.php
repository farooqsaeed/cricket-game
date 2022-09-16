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
                        </strong> new team </h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{ URL('/teams/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                      <input type="hidden" name="event_id" value="{{$id}}">
                            
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
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Nick</label>
                                    <input type="text" class="form-control" name="nick"
                                    value="{{ Request::old('nick') }}">
                                    @if ($errors->has('nick'))
                                     <span class="text-danger">{{ $errors->first('nick') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Logo</label>
                                     <input type="file" class="form-control" name="icon">
                                     @if ($errors->has('icon'))
                                     <span class="text-danger">{{ $errors->first('icon') }}</span>
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